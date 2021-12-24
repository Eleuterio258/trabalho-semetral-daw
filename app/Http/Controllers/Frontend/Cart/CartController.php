<?php

namespace App\Http\Controllers\Frontend\Cart;


use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function cart()
    {

        $carts = Cart::count();
        $cart = Cart::where('user_id', Auth()->user()->id)->get();

        $categories = Category::all();
        echo view('layout/header', compact('carts'));
        echo view('layout/navbar', compact('categories'));
        echo view('layout/mobilemenubar');
        echo view('layout/mobilesidebarmenu');
        echo view('custumers.cart', compact('cart'));
        echo view('layout/footer');
        echo view('layout/script');
    }

    public function addToCart(Request $request)
    {
        $chek = Cart::where('product_id', $request
            ->product_id)
            ->where('user_id', Auth()->user()->id)
            ->exists();

        if ($chek) {
            Cart::where('product_id', $request->product_id)
                ->where('user_id', Auth()->user()->id)
                ->increment('quantity');
            return response()->json(['status' => 'Product is update in your cart'], 200);
        } else {
            $cart = new Cart();
            $cart->user_id = Auth()->user()->id;
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->quantity;
            $cart->save();

            return response()->json(['status' => 'Product is add in your cart'], 200);
        }
    }



    public function deleteToCart(Request $request)
    {

        $id = $request->input('product_id');
        try {
            $cart = Cart::query()->where('product_id', $id)->where('user_id', Auth()->user()->id)->delete();
            return response()->json(['status' => 'Produto removido com sucesso'], 200);
        } catch (\Exception $exception) {
            return response()->json(['status' => $exception], 500);
        }
    }



    public function updateCart(Request $request)
    {

        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        if (Cart::where('product_id', $product_id)->where('user_id', Auth()->user()->id)->exists()) {
            $cart = Cart::where('product_id', $product_id)
                ->where('user_id', Auth()->user()->id)->first();
            $cart->quantity = $quantity;
            $cart->update();

            return response()->json(['status' => 'Product updated successfully'], 200);
        } else {
            return response()->json(['status' => '$exception'], 500);
        }
    }
}
