<?php

namespace Hoangstark\ShufuEncoderSdk;

class ShufuEncoderSdk
{

	private $accessToken;

    public function login($url, $username, $password)
    {
    	$curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('email' => $username,'password' => $password),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return false;
        } else {
            $data = json_decode($response);
            $this->accessToken = $data->access_token;
            return true;
        }
    }

    public function getAccessToken()
    {
    	return $this->accessToken;
    }
}
