<?php

namespace App\Service;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Order;
use GuzzleHttp\Client;
use App\Models\Province;
use App\Models\Subdistrict;
use GuzzleHttp\Exception\RequestException;

class RajaOngkir
{
    public static function getProvince()
    {
        try {
            $client = new Client();
            $response = $client->request('GET', env('RAJA_ONGKIR_URL').'/province?key='.env('RAJA_ONGKIR_API_KEY').'&id=');

            $body = json_decode($response->getBody(), true);

            foreach ($body['rajaongkir']['results'] as $val) {
                Province::create([
                    'province' => $val['province']
                ]);
            }

            return $body;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function getCity()
    {
        try {
            $client = new Client();
            $response = $client->request('GET', env('RAJA_ONGKIR_URL').'/city?key='.env('RAJA_ONGKIR_API_KEY').'&id=');

            $body = json_decode($response->getBody(), true);

            foreach ($body['rajaongkir']['results'] as $val) {
                City::create([
                    'province_id' => $val['province_id'],
                    'city' => $val['city_name']
                ]);
            }

            return $body;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function getSubdistrict()
    {
        set_time_limit(3000);
        try {
            $client = new Client();
            $response = $client->request('GET', env('RAJA_ONGKIR_URL').'/subdistrict?key='.env('RAJA_ONGKIR_API_KEY').'&city=17');
            $body = json_decode($response->getBody(), true);

            // foreach (City::all() as $city) {
            //     $client = new Client();
            //     $response = $client->request('GET', env('RAJA_ONGKIR_URL').'/subdistrict?key='.env('RAJA_ONGKIR_API_KEY').'&city='.$city->id);
            //     $body = json_decode($response->getBody(), true);
            //     foreach ($body['rajaongkir']['results'] as $val) {
            //         Subdistrict::create([
            //             'province_id' => $val['province_id'],
            //             'city_id' => $val['city_id'],
            //             'subdistrict' => $val['subdistrict_name']
            //         ]);
            //     }
            // }

            return $body;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function checkOngkir($data)
    {
        try {
            $client = new Client();
            $url = env('RAJA_ONGKIR_URL').'/cost';

            $headers = [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Key' => env('RAJA_ONGKIR_API_KEY')
            ];

            $params= [
                'headers' => $headers,
                'form_params' => $data,
            ];

            $response = $client->request('POST', $url, $params);
            $body = json_decode($response->getBody(), true);

            return $body;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function updateDeliveryOrderStatus(){
        foreach (Order::whereStatus(IS_ORDER_SENT)->get() as $order) {
            try {
                $client = new Client();
                $url = env('RAJA_ONGKIR_URL').'/waybill';
    
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Key' => env('RAJA_ONGKIR_API_KEY')
                ];
    
                $params= [
                    'headers' => $headers,
                    'form_params' => [
                        'waybill' => $order->no_resi,
                        'courier' => $order->shipping_courier
                    ],
                ];
    
                $response = $client->request('POST', $url, $params);
                $body = json_decode($response->getBody(), true);

                if($body['rajaongkir']['result']['delivered'] == true){
                    $order->update([
                        'status' => IS_ORDER_EVALUATION
                    ]);
                }

                $order->update([
                    'delivery_status' => json_encode($body)
                ]);

                // return 'OK';
            } catch (\Throwable $th) {
                // return $th->getMessage();
            }
        }
    }
}
