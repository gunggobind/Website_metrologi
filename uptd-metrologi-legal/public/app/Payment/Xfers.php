<?php

namespace App\Payment;

use Illuminate\Http\Request;
use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Xfers
{
    public static function create($data)
    {
        try {
            $client = new Client();
            $response = $client->request('POST', env('XFERS_URL').'payments', [
                'auth' => [
                    env('XFERS_API_KEY'), env('XFERS_SECRET_KEY')
                ],
                'headers' => [
                    'Content-Type' => 'application/vnd.api+json',
                ],
                'body' => json_encode($data)
            ]);

            $body = json_decode($response->getBody(), true);
            return $body;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
