<?php

namespace App\Http\Controllers\Frontend\Wishlist;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{

    public function getWishlist()
    {


        $carts = Cart::count();
        $wishlists = Wishlist::where('user_id',  Auth()->user()->id)->get();
        $categories = Category::all();
        echo view('layout/header', compact('carts'));
        echo view('layout/navbar', compact('categories'));
        echo view('layout/mobilemenubar');
        echo view('layout/mobilesidebarmenu');
        echo view('custumers.wishlist', compact('wishlists'));
        echo view('layout/footer');
        echo view('layout/script');
    }
    public function addToWishlist(Request $request)
    {




        if (Wishlist::where('product_id', $request->product_id)->where('user_id', 2)->exists()) {

            return response()->json(['status' => 'Product is exist Wishlist'], 200);
        } else {
            $wishlist = Wishlist::query()->create([
                'user_id' => Auth()->user()->id,
                'product_id' => $request->product_id
            ]);

            return response()->json(['status' => 'Product Add to Wishlist'], 200);
        }
    }



    public function destroy(Request $request)
    {



        $id = $request->input('product_id');
        try {
            Wishlist::query()->where('product_id', $id)->where('user_id', Auth()->user()->id)->delete();
            return response()->json(['status' => 'Produto removido com sucesso'], 200);
        } catch (\Exception $exception) {
            return response()->json(['status' => $exception], 500);
        }
    }
}
