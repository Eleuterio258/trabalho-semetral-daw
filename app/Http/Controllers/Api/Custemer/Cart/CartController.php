<?php

namespace App\Http\Controllers\Api\Custemer\Cart;


use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{



    public function addToCard(Request $request)
    {

        if (Cart::where('product_id', $request->product_id)->where('user_id', Auth()->user()->id)->exists()) {
            Cart::where('product_id', $request->product_id)->where('user_id', Auth()->user()->id)->increment('quantity');
            return response()->json(['success' => 'Product is update in your cart'], 200);
        } else {
            $cart = Cart::query()->create([
                'user_id' => Auth()->user()->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);

            return response()->json(['data' => 'ok'], 200);
        }
    }

    public function cart()
    {

        $carts = Cart::count();
        $cart = Cart::where('user_id',  2)->get();

        $categories = Category::all();
        echo view('layout/header', compact('carts'));
        echo view('layout/navbar', compact('categories'));
        echo view('layout/mobilemenubar');
        echo view('layout/mobilesidebarmenu');
        echo view('custumers.cart', compact('cart'));
        echo view('layout/footer');
        echo view('layout/script');
    }

    public function delete($id)
    {
        try {
            $cart = Cart::query()->where('product_id', $id)->delete();
            return response()->json(['data' => 'ok'], 200);
        } catch (\Exception $exception) {
            return response()->json(['data' => $exception], 500);
        }
    }

    public function clerCart()
    {
        try {
            $cart =new Cart();
            $cart->delete();
            return response()->json(['data' => 'ok'], 200);
        } catch (\Exception $exception) {
            return response()->json(['data' => $exception], 500);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $cart = Cart::query()->where('product_id', $id)->first();
            $cart->quantity = $request->quantity;
            $cart->update();
            return response()->json(['data' => 'ok'], 200);
        } catch (\Exception $exception) {
            return response()->json(['data' => $exception], 500);
        }
    }

    public function incremento(Request $request)
    {


        try {
            Cart::where('product_id', $request->product_id)->where('user_id', Auth()->user()->id)->increment('quantity');
            return response()->json(['data' => 'ok'], 200);
        } catch (\Exception $exception) {
            return response()->json(['data' => $exception], 500);
        }
    }

    public function decremento(Request $request)
    {
        try {
            Cart::where('product_id', $request->product_id)->where('user_id', Auth()->user()->id)->decrement('quantity');

            return response()->json(['data' => 'ok'], 200);
        } catch (\Exception $exception) {
            return response()->json(['data' => $exception], 500);
        }
    }
}
