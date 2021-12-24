<?php

namespace App\Http\Controllers\Api\Pay;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Paymentsds\MPesa\Client;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    public function pay(Request $request)
    {




        $reference =   rand(1, 1000000);
        $celular = $request->input('phone');
        $id = $request->input('ordersid');
        $valor = $request->input('total');


        $client = new Client([
            'apiKey' =>  env('APIKEY'),
            'publicKey' =>  env('PUBLICKEY'),
            'serviceProviderCode' =>  env('SERVICEPROVIDERCODE')
        ]);


        $paymentData = [
            'from' => '258' . $celular,
            'reference' => $reference,
            'transaction' => 'T12344CC',
            'amount' => $valor
        ];

        $result = $client->receive($paymentData);

        if ($result->success) {


            $order = Order::find($id);
            $order->status = '1';
            $order->update();
            $carts = Cart::count();

            $orders = Order::where('user_id', Auth()->user()->id)->get();
            $categories = Category::all();
            echo view('layout/header', compact('carts'));
            echo view('layout/navbar', compact('categories', 'orders'));
            echo view('layout/mobilemenubar');
            echo view('layout/mobilesidebarmenu');
            echo view('custumers.orders.paymentcomplete');
            echo view('layout/footer');
            echo view('layout/script');
        } else {
            $carts = Cart::count();

            $orders = Order::where('user_id', Auth()->user()->id)->get();
            $categories = Category::all();
            echo view('layout/header', compact('carts'));
            echo view('layout/navbar', compact('categories', 'orders'));
            echo view('layout/mobilemenubar');
            echo view('layout/mobilesidebarmenu');
            echo view('custumers.orders.paymenterror');
            echo view('layout/footer');
            echo view('layout/script');
        }
    }
}
