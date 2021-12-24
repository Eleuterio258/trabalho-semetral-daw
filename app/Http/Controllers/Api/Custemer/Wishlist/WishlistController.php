<?php

namespace App\Http\Controllers\Api\Custemer\Wishlist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request)
    {

        if (Wishlist::where('product_id', $request->product_id)->where('user_id', Auth()->user()->id)->exists()) {

            return response()->json(['success' => 'Product is exist Wishlist'], 200);
        } else {
            $wishlist = Wishlist::query()->create([
                'user_id' => Auth()->user()->id,
                'product_id' => $request->product_id
            ]);

            return response()->json(['success' => 'Product Add to Wishlist'], 200);
        }
    }

    public function getWishlist()
    {
        try {
            $wishlists = Wishlist::where('user_id', auth()->user()->id)->get();
            $wishlist = [];

            foreach ($wishlists as $item) {

                $data = [
                    "id" => $item->id,
                    "name" => $item->products->name,
                    "price" => $item->products->price,
                    "description" => $item->products->description,
                    "category" => $item->products->category->name,
                    "stock" => $item->products->stock,
                    "rating" => $item->products->rating,
                    "image" => $item->products->image
                ];

                array_push($wishlist, $data);
            }

            return response()->json(['wishlist' => $wishlist], 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }

    public function destroy($id)
    {
        try {

            if (Wishlist::where('product_id', $id)->where('user_id', Auth()->user()->id)->exists()) {
                 Wishlist::query()->where('product_id', $id)->delete();

                return response()->json(['success' => 'Product deleted Wishlist'], 200);
            } else {
                return response()->json(['success' => 'Product is not exist Wishlist'], 200);
            }
        } catch (\Exception $exception) {
            return response()->json(['data' => $exception], 500);
        }
    }
}
