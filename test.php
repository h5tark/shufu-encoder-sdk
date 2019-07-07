<?php

$accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODA4MFwvYXBpXC9sb2dpbiIsImlhdCI6MTU2MjQ5MTI5NiwibmJmIjoxNTYyNDkxMjk2LCJqdGkiOiJVYXFhNUNvUzJ4M05JMVdDIiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.vzZRZApherwWIkdd5UIaHafwKXGRQZ-XOdEHD1QRl9o';

$data = array(
    "webhook_success" => "https://enpii3jcfpr19.x.pipedream.net",
    "webhook_error" => "https://en4vdjmi70ib.x.pipedream.net/",
    "encode_formats" => [
        [
            "width" => 1280,
            "height" => 0,
            "video_kilobitrate" => "1500",
            "audio_kilobitrate" => "128",
            "video_codec" => "libx264",
            "audio_codec" => "aac",
            "profile" => "main",
            "preset" => "veryfast"
        ],
    ],
);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost:8080/api/tasks",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => array("Content-Type: application/json", 'Authorization: Bearer ' . $accessToken),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    return null;
} else {
    var_dump($response);
    $responseData = json_decode($response);
    return $responseData;
}
