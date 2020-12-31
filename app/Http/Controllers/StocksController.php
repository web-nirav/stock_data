<?php

namespace App\Http\Controllers;

use App\Traits\CommonTrait;

class StocksController extends Controller
{
    use CommonTrait;
    
    public function index()
    {
        // dd('here');
        $key = config('app.access_key');
         /*  // optional parameters: 
        & interval = 1h
        & sort = DESC
        & date_from = YYYY-MM-DD
        & date_to = YYYY-MM-DD
        & limit = 100
        & offset = 0
        */
        $apiUrl = "http://api.marketstack.com/v1/intraday?access_key={$key}&symbols=AAPL&limit=20&sort=DESC";
        $response = $this->createApiRequest($apiUrl, 'GET');
        // dd($response);
        $stocks = $response['data'];

        if(request()->ajax()){
            return response()->json([
                'status' => true,
                "data" => view('stocks._list', compact('stocks'))->render()
            ]);
        }

        return view('stocks.index', compact('stocks'));
    }
   
}
