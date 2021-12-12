<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        return view('page.payment');
    }

    public function verify(Request $request)
    {
        dd($request->all());
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$request->transaction_id}/verify",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer FLWSECK-4dcb068448083347ab0c02de401f4c0c-X"// secrete key goes here
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // echo $response;
        $res =  json_decode($response);

        return  [$res];
    }
}
