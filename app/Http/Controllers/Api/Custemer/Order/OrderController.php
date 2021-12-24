<?php

namespace App\Http\Controllers\Api\Custemer\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function orderpending()
    {
        $orders =  Order::where('status', '0')
            ->where('user_id', Auth()->user()->id)->get();
        $order = array();
        foreach ($orders as $item) {

            $data = [
                "order_data" => date('d-m-y', strtotime($item->created_at)),
                "order_tacking" => $item->order_tacking,
                "total_price" => $item->total_price,
                "status" => $item->status == "0" ? 'Pending' : 'Complete',

            ];

            array_push($order, $data);
        }

        return $order;
    }
    public function ordercomplete()
    {
        $orders =  Order::where('status', '1')
            ->where('user_id', Auth()->user()->id)->get();
        $order = array();
        foreach ($orders as $item) {

            $data = [
                "order_data" => date('d-m-y', strtotime($item->created_at)),
                "order_tacking" => $item->order_tacking,
                "total_price" => $item->total_price,
                "status" => $item->status == "0" ? 'Pending' : 'Complete',

            ];

            array_push($order, $data);
        }

        return $order;
    }


    public function index()
    {
        $orders =  Order::all();
        $order = array();
        foreach ($orders as $item) {

            $data = [
                "order_data" => date('d-m-y', strtotime($item->created_at)),
                "order_tacking" => $item->order_tacking,
                "total_price" => $item->total_price,
                "status" => $item->status == "0" ? 'Pending' : 'Complete',

            ];

            array_push($order, $data);
        }

        return $order;
    }


    public function orderdetalhe($id)
    {

        $orders =  Order::where('id', $id)->where('user_id', Auth()->user()->id)

            ->first();
        $order = [];
         foreach ($orders->orderItems as $item) {
             $data = [
                 'name' =>  $item->products->name,
                 'quantity' => $item->quantity,
                 'price' => $item->price,
             ];

             array_push($order, $data);
         }


        $orderAddress = [
            'FistName' => $orders->fname,
            'LastName' => $orders->lname,
            'Email' => $orders->email,
            'Phone' => $orders->phone,
            'ShoppingAddress' => $orders->address,
            'Zip' => $orders->postalcode,
            'iva' => $orders->iva,
            'status' => $orders->status,
            'total' => $orders->total_price,

        ];

        return [$orderAddress, $order];
    }
}
