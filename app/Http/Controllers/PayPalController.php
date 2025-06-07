<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PayPalController extends Controller
{
    /**
     * @noinspection PhpMissingReturnTypeInspection
     */
    

    /**
     * @return string
     */
    private function getAccessToken(): string
    {
        $headers = [
            'Content-Type'  => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic ' . base64_encode(config('paypal.client_id') . ':' . config('paypal.client_secret'))
        ];

        $response = Http::withHeaders($headers)
                        ->withBody('grant_type=client_credentials','application/x-www-form-urlencoded')
                        ->post(config('paypal.base_url') . '/v1/oauth2/token');

        return json_decode($response->body())->access_token;
    }

    /**
     * @return string
     */

    public function create(Request $request)
    {
        $amount = $request->input('amount', 10); // Recoge el amount desde JSON

        $id = (string) Str::uuid();

        $headers = [
            'Content-Type'      => 'application/json',
            'Authorization'     => 'Bearer ' . $this->getAccessToken(),
            'PayPal-Request-Id' => $id,
        ];

        $body = [
            "intent"         => "CAPTURE",
            "purchase_units" => [
                [
                    "reference_id" => $id,
                    "amount"       => [
                        "currency_code" => "EUR",
                        "value"         => number_format($amount, 2, '.', ''),
                    ]
                ]
            ]
        ];

        $response = Http::withHeaders($headers)
                        ->post(config('paypal.base_url') . '/v2/checkout/orders', $body);

        if ($response->failed()) {
            return response()->json(['error' => 'Error al crear la orden PayPal'], 500);
        }

        $responseBody = json_decode($response->body());

        Session::put('request_id', $id);
        Session::put('order_id', $responseBody->id);

        return response()->json([
            'orderID' => $responseBody->id
        ]);
    }


    /**
     * @return mixed
     */
    public function complete()
    {
        $url = config('paypal.base_url') . '/v2/checkout/orders/' . Session::get('order_id') . '/capture';

        $headers = [
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . $this->getAccessToken(),
        ];

        $response = Http::withHeaders($headers)
                        ->post($url, null);

        return json_decode($response->body());
    }
}