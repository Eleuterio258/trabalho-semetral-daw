<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function index()
    {

        $oldcartItens = Cart::where('user_id', Auth::id())->get();
        $carts = Cart::count();

        foreach ($oldcartItens as $itens) {


            if (!Product::where('id', $itens->product_id)->where('stock', '>=', $itens->product_id)->exists()) {
                $cartRemove = Cart::where('user_id', Auth()->user()->id)->where('product_id', $itens->product_id)->first();
                $cartRemove->delete();
            }
        }
        $cartItens = Cart::where('user_id', Auth::id())->get();

        $categories = Category::all();
        echo view('layout/header', compact('carts'));
        echo view('layout/navbar', compact('categories'));
        echo view('layout/mobilemenubar');
        echo view('layout/mobilesidebarmenu');
        echo view('custumers.checkout', compact('cartItens'));
        echo view('layout/footer');
        echo view('layout/script');
    }


    public function placeorder(Request $request)
    {

        try {

            $total = 0;
            $frete  = 0;

            $subtotal = 0;
            $cartItems = Cart::where('user_id', Auth()->user()->id)->get();
            foreach ($cartItems as $itemTotal) {
                $subtotal += $itemTotal->quantity * $itemTotal->products->price;
                $subtotal >= 10000 ? ($frete = 0) : ($frete = 500);
                $total =   $subtotal + $frete;
            }


          

            $order = new Order();
            $order->user_id = Auth()->user()->id;
            $order->fname = $request->input('fname');
            $order->lname = $request->input('lname');
            $order->email = $request->input('email');
            $order->phone = $request->input('phone');
            $order->address = $request->input('address');
            $order->city = $request->input('city');
            $order->province = $request->input('province');
            $order->postalcode = $request->input('postalcode');
            $order->subtotal =  $subtotal;
            $order->total_price =  $total;
            $order->frete =  $frete;
            $order->order_tacking = 'vendaKZT' . rand(1111, 9999);
            $order->save();



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

            if (Auth()->user()->address == NULL) {
                $user = User::where('id',  Auth()->user()->id)->first();
                $user->fname = $request->input('fname');
                $user->lname = $request->input('lname');
                $user->phone = $request->input('phone');
                $user->address = $request->input('address');
                $user->city = $request->input('city');
                $user->province = $request->input('province');
                $user->postalcode = $request->input('postalcode');
                $user->update();
            }


            $cartItems = Cart::where('user_id', Auth()->user()->id)
                ->get();
            //clear cart
            Cart::destroy($cartItems);


            return redirect('/complete')->with('status', 'order proced successfully');


            ///

        } catch (\Exception $exception) {
            return response()->json(['data' => 'error' . $exception], 500);
        }
    }


    public function complete()
    {
        $carts = Cart::count();

        $orders = Order::where('user_id', Auth()->user()->id)->get();
        $categories = Category::all();
        echo view('layout/header', compact('carts'));
        echo view('layout/navbar', compact('categories', 'orders'));
        echo view('layout/mobilemenubar');
        echo view('layout/mobilesidebarmenu');
        echo view('custumers.ordercomplete', compact('orders'));
        echo view('layout/footer');
        echo view('layout/script');
    }


    public function order()
    {
        $carts = Cart::count();

        $orders = Order::where('user_id', Auth()->user()->id)->get();
        $categories = Category::all();
        echo view('layout/header', compact('carts'));
        echo view('layout/navbar', compact('categories', 'orders'));
        echo view('layout/mobilemenubar');
        echo view('layout/mobilesidebarmenu');
        echo view('custumers.orders.index', compact('orders'));
        echo view('layout/footer');
        echo view('layout/script');
    }

    public function view($id)
    {
        $carts = Cart::count();

        $orders = Order::where('id',$id)->where('user_id', Auth()->user()->id)->first();
        $categories = Category::all();
        echo view('layout/header', compact('carts'));
        echo view('layout/navbar', compact('categories', 'orders'));
        echo view('layout/mobilemenubar');
        echo view('layout/mobilesidebarmenu');
        echo view('custumers.orders.view', compact('orders'));
        echo view('layout/footer');
        echo view('layout/script');
    }
}
