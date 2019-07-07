<?php

namespace Hoangstark\ShufuEncoderSdk;

/**
 * Class ShufuEncoderSdk
 * @package Hoangstark\ShufuEncoderSdk
 */
class ShufuEncoderSdk
{

    private $accessToken;
	private $endPoint;

    /**
     * Get access token
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Login
     *
     * @param string $endPoint Endpoint should not contain "/" in the last character
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function login($endPoint, $username, $password)
    {
        $this->endPoint = $endPoint;

    	$curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->endPoint.'/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('username' => $username,'password' => $password),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return false;
        } else {
            $responseData = json_decode($response);
            $this->accessToken = $responseData->access_token;
            return true;
        }
    }

    /**
     * Get tasks
     *
     * @return mixed|null
     */
    public function getTasks()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->endPoint."/tasks/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array('Authorization: Bearer ' . $this->accessToken ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return null;
        } else {
            $responseData = json_decode($response);
            return $responseData;
        } 
    }

    /**
     * Get encoding tasks
     *
     * @return mixed|null
     */
    public function getEncodingTasks()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->endPoint."/encoding-tasks/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array('Authorization: Bearer ' . $this->accessToken ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return null;
        } else {
            $responseData = json_decode($response);
            return $responseData;
        } 
    }

    /**
     * Get single task
     *
     * @param int $id
     * @return mixed|null
     */
    public function getTask($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->endPoint."/tasks/".$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array('Authorization: Bearer ' . $this->accessToken ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return null;
        } else {
            $responseData = json_decode($response);
            return $responseData;
        } 
    }

    /**
     * Get single task encoding progress
     *
     * @param int $id
     * @return bool|string|null
     */
    public function getTaskProgress($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->endPoint."/tasks/".$id."/progress",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array('Authorization: Bearer ' . $this->accessToken ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return null;
        } else {
            return $response;
        } 
    }

    /**
     * Create task
     *
     * @param array $data
     * @return mixed|null
     */
    public function createTask($data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->endPoint."/tasks",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array("Content-Type: application/json", 'Authorization: Bearer ' . $this->accessToken),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return null;
        } else {
            $responseData = json_decode($response);
            return $responseData;
        } 
    }

    /**
     * Update task
     *
     * @param int $id
     * @param array $data
     * @return mixed|null
     */
    public function updateTask($id, $data)
    {
        $data = array_merge($data, array(
            "_method" => 'put',
        ));

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->endPoint."/tasks/".$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array("Content-Type: application/json", 'Authorization: Bearer ' . $this->accessToken),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return null;
        } else {
            $responseData = json_decode($response);
            return $responseData;
        } 
    }

    /**
     * Dispatch task to queue
     *
     * @param int $id
     * @return mixed|null
     */
    public function queueTask($id)
    {
        $data = array(
            "_method" => 'put',
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->endPoint."/tasks/".$id."/queue",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array("Content-Type: application/json", 'Authorization: Bearer ' . $this->accessToken),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return null;
        } else {
            $responseData = json_decode($response);
            return $responseData;
        } 
    }
}
