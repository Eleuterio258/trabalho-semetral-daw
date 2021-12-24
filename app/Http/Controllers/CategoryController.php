<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($name)
    {

        if (Category::where("name", $name)->exists()) {
            $category = Category::where("name", $name)->first();
            $categories = Category::all();
            $carts = Cart::count();
            $brands = Brand::all();
            $products = Product::where("category_id", $category->id)->get();
            echo view('layout/header', compact('carts'));
            echo view('layout/navbar', compact('categories'));
            echo view('layout/mobilemenubar');
            echo view('layout/mobilesidebarmenu');
            echo view('custumers.category', compact('products', 'brands', 'category'));
            echo view('layout/footer');
            echo view('layout/script');
        } else {
            return redirect('/');
        }
    }
}
