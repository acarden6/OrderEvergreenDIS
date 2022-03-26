<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class OrderController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create()
    {
        // Lista de produtos
        $client = new Client();
        $api_url = config('api.url');
        $url_products = $api_url . '/products';

        $response = $client->request('GET', $url_products, [
            'verify'  => false,
        ]);

        $products = json_decode($response->getBody());

        // Lista de clientes
        $url_users = $api_url . '/clients';

        $response = $client->request('GET', $url_users, [
            'verify'  => false,
        ]);

        $users = json_decode($response->getBody());

        return view('order.create', compact('products', 'users'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'exit_date' => 'required',
            'products' => [
                [
                    'product' => 'required',
                    'quantity' => 'required'
                ]
            ],
            'client' => 'required'
        ]);

        $api_url = config('api.url');
        $input = $request->all();

        $response = Http::post($api_url . '/orders', [
            'exit_date' => $input['exit_date'],
            'products' => [
                [
                    'product' => $input['product'],
                    'quantity' => $input['quantity']
                ]
            ],
            'client' => $input['client']
        ]);

        return back()->with('success', 'Item created successfully!');
    }

}
