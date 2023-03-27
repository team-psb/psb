<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

function sendMessage($data)
{

    try {
        $appUrlFontee = "https://api.fonnte.com/send";
        $tokenFontee = 'azirSQttjrWI7QuIZA73';
        // $tokenFontee = '!eciHq9Szhs3863ra63z';

        $response = Http::withHeaders([
            'Authorization' => $tokenFontee,
        ])->post($appUrlFontee, $data);

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => $appUrlFontee,
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS => $data,
        //     CURLOPT_HTTPHEADER => array(
        //         'Authorization: ' . $tokenFontee
        //     ),
        // ));
        // $resultData = curl_exec($curl);

        // curl_close($curl);

        // dd($response->body());

        // return $resultData;
    } catch (\Throwable $th) {
        Log::error($th->getMessage());
        return $th;
    }

    // $appUrl = "https://wa.pondokinformatika.xyz/api/v1/send-message";

    // $curl = curl_init();
    // curl_setopt($curl, CURLOPT_POST, 1);
    // curl_setopt($curl, CURLOPT_URL, $appUrl);
    // curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    // curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    //     'Content-Type: application/json',
    // ));

    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    // $resultData = curl_exec($curl);
    // if (!$resultData) {
    //     die("Invalid API Request!");
    // }
    // curl_close($curl);

    // return $resultData;
}
