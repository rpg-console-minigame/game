<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\videogameMail;


class ContactController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            $request->input('nombre'),
            $request->input('email'),
            $request->input('asunto'),   
            $request->input('mensaje')
        ];

        Mail::to('consoleminigamerpg@gmail.com')->send(
        new videogameMail(
            $request->input('nombre'),  
                $request->input('email'),
                $request->input('asunto'),  
                $request->input('mensaje')
        )
);


        return back()->with('success', 'Mensaje enviado correctamente.');
    }
}