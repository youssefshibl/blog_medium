<?php

namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class  FatoorahServices
{

    private $base_url;
    private $headers;
    private $request_client;

    public function __construct(Client $client)
    {

        $this->base_url = env('FATOORAH_BASE_URL');
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . env('FATOORAH_API_KEY')
        ];
        $this->request_client = $client;
    }

    public function buildRequest($method, $url, $body = null)
    {

        $request = new Request($method, $this->base_url . $url, $this->headers);

        if ( !$body) {
            return false ;
        }
        $response = $this->request_client->send($request, ['json' => $body]);

        if ($response->getStatusCode() != 200) {
            return false;
        }

        $response_body = json_decode($response->getBody());
        return $response_body;
    }


    public function sendPayment($postFields)
    {

         $response = $this->buildRequest('POST', '/v2/SendPayment', $postFields);
        return $response;
    }

    public function getPaymentstatus($payment_id)
    {

        $data = [
            'key'=> $payment_id,
            'keyType'=> 'paymentId',
        ];
         $response = $this->buildRequest('POST', '/v2/getPaymentStatus', $data);
        return $response;
    }
}
