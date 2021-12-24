<?php

namespace App\Http\Controllers\Api\Custemer\Cart;


use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class CheckoutController extends Controller
{

    public function index()
    {
        try {
            $oldcartItens = Cart::where('user_id', Auth()->user()->id)
                ->get();

            foreach ($oldcartItens as $itens) {

                if (!Product::where('id', $itens->product_id)->where('stock', '>=', $itens->product_id)->exists()) {
                    $cartRemove = Cart::where('user_id', Auth()->user()->id)
                        ->where('product_id', $itens->product_id)
                        ->first();
                    $cartRemove->delete();
                }
            }
            $cartItens = Cart::where('user_id', Auth()->user()->id)
                ->get();

            return  $cartItens;
        } catch (\Exception $exception) {
            return response()->json(['data' => $exception], 500);
        }
    }


    public function place()
    {

        try {
            $total = 0;


            //add to order
            $order = new Order();
            $order->user_id = Auth()->user()->id;
            $order->fname = Auth()->user()->fname;
            $order->lname = Auth()->user()->lname;
            $order->email = Auth()->user()->email;
            $order->phone = Auth()->user()->phone;
            $order->address = Auth()->user()->address;
            $order->city = Auth()->user()->city;
            $order->province = Auth()->user()->province;
            $order->postalcode = Auth()->user()->postalcode;

            /**   $order = new Order();
            $config =new  Setting();
            $order->user_id = Auth()->user()->id;
            $order->fname = $req->fname;
            $order->lname = $req->lname;
            $order->email = $req->email;
            $order->phone = $req->phone;
            $order->address = $req->address;
            $order->city = $req->city;
            $order->province = $req->province;
            $order->postalcode = $req->postalcode; */



            //carcul totol price
            $cartItems_total = Cart::where('user_id', Auth()->user()->id)->get();
            foreach ($cartItems_total as $prod) {
                $total += $prod->products->price;
            }

            $order->total_price = $total;

            $order->order_tacking = 'KZT' . rand(1111, 9999);
            $order->save();


            $cartItems = Cart::where('user_id', Auth()->user()->id)
                ->get();

            foreach ($cartItems as $item) {

                //add product item cart
                OrderItem::create([
                    "order_id" => $order->id,
                    "product_id" => $item->product_id,
                    "quantity" => $item->quantity,
                    "price" => $item->products->price
                ]);

                //update product stock
                $product = Product::where('id', $item->product_id)->first();
                $product->stock = $product->stock - $item->quantity;
                $product->update();
            }



            $cartItems = Cart::where('user_id', Auth()->user()->id)
                ->get();
            //clear cart
            Cart::destroy($cartItems);


            return response()->json(['data' => "ok"], 200);
        } catch (\Exception $exception) {
            return response()->json(['data' => $exception], 500);
        }
    }
}
