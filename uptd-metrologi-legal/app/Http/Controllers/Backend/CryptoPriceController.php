<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CryptoPriceController extends Controller
{
    public function index(){

        try {
            $client = new Client();
            $response = $client->get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=idr&order=market_cap_desc&per_page=250&page=1&sparkline=false', [/** options **/]);
            $body = json_decode($response->getBody(), true);
            $data = [];
            $label = [];
            
            foreach($body as $item){
                $label[] = $item['name'];
                $data[] = $item['current_price'];
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
        return view('backend.crypto-price.index', [
            'label' => $label,
            'data' => $data,
            'items' => $body
        ]);
    }
}
