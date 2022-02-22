<?php
    function sendMessage($data)
    {
        $appUrl = "https://wa.pondokinformatika.xyz/api/v1/send-message";
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_URL, $appUrl);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        $resultData = curl_exec($curl);
        if(!$resultData){
            die("Invalid API Request!");
        }
        curl_close($curl);
        
        return $resultData;
    }