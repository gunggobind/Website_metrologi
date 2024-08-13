<?php

namespace App\Payment;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TopUp;

class Tripay
{
    public static function create($data)
    {
        $merchantRef  = TopUp::latest()->first() ? TopUp::latest()->first()->id + 1 : 1;
        $params = [
            'method'         => $data['method'],
            'merchant_ref'   => $merchantRef,
            'amount'         => $data['amount'],
            'customer_name'  => auth()->user()->name,
            'customer_email' => auth()->user()->email,
            'customer_phone' => auth()->user()->telepon,
            'order_items'    => [
                [
                    'sku'         => 'Bancin Finance',
                    'name'        => 'Deposit Token BCN',
                    'price'       => $data['amount'],
                    'quantity'    => 1,
                    'product_url' => null,
                    'image_url'   => null,
                ]
            ],
            'return_url'   => route('backend.token-bcn.deposit'),
            'expired_time' => Carbon::now()->addDay(3)->timeZone('Asia/Jakarta')->timestamp, // 3 days
            'signature'    => hash_hmac('sha256', env('TRIPAY_MERCHANT_KODE').$merchantRef.$data['amount'], env('TRIPAY_PRIVATE_KEY'))
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => env('TRIPAY_SANDBOX_BASE_URL').'/transaction/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.env('TRIPAY_API_KEY')],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query($params)
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        return empty($error) ? $response : $error;
    }
}
