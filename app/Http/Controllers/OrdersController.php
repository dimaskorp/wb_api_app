<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Support\Facades\Http;

class OrdersController extends Controller
{
    public function orders()
    {
        $response = Http::get('89.108.115.241:6969/api/orders', [
            'dateFrom' => '2023-08-10',
            'dateTo' => '2023-08-11',
            'page' => 1,
            'key' => 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie',
            'limit' => 100,

        ]);

        $orders = $response->json();
        //dd($orders);
        if (array_key_exists('data', $orders)) {
            if (empty($orders['data'])) {
                return 'list is empty.';
            } else
                foreach ($orders['data'] as $index) {
                    Orders::insert([
                        $index
                    ]);
                }

        }
        return 'Orders synced successfully';
    }

}
