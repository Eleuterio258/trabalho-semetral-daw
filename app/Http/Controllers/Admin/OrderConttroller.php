<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderConttroller extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '>', '1')->get();
        return view('admin.order.index', compact('orders'));
    }






    public function edit($id)
    {
        $deliveryes = Delivery::all();
        $order = Order::find($id);
        return view('admin.order.edit', compact('order', 'deliveryes'));
    }


    public function update(Request $request, $id)
    {


        $order = Order::find($id);
        $order->status = '3';
        $order->delivery_id = $request->input('delivery');
        $order->update();
        return redirect()->back()->with('success', 'order information updated successfully!');
        // }
        // return redirect()->back()->with('failed', 'order information could not update!');
    }
}
