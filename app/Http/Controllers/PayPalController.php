<?php
// app/Http/Controllers/PayPalController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\{Amount, Item, ItemList, Payer, Payment, PaymentExecution, RedirectUrls, Transaction};

class PayPalController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('paypal.client_id'),
                config('paypal.secret')
            )
        );

        $this->apiContext->setConfig([
            'mode' => config('paypal.mode'),
        ]);
    }

    public function checkout()
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $amount = new Amount();
        $amount->setCurrency("USD")
               ->setTotal(10.00); // Precio del producto

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setDescription("Compra de producto XYZ");

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal.success'))
                     ->setCancelUrl(route('paypal.cancel'));

        $payment = new Payment();
        $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions([$transaction]);

        try {
            $payment->create($this->apiContext);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error al crear el pago: ' . $e->getMessage());
        }

        // Redirige a PayPal
        return redirect()->away($payment->getApprovalLink());
    }

    public function success(Request $request)
    {
        $paymentId = $request->get('paymentId');
        $payerId = $request->get('PayerID');

        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext);
            return view('paypal.success', compact('result'));
        } catch (\Exception $e) {
            return redirect()->route('paypal.cancel');
        }
    }

    public function cancel()
    {
        return view('paypal.cancel');
    }
}

?>

