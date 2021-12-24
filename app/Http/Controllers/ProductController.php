<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productinfo($namecat, $nameproduc)
    {

        if (Category::where("name", $namecat)->exists()) {

            if (Product::where("name", $nameproduc)->exists()) {
                $products  = Product::where("name", $nameproduc)->first();
                $categories = Category::all();
                $carts = Cart::count();
                $brands = Brand::all();
                echo view('layout/header', compact('carts'));
                echo view('layout/navbar', compact('categories'));
                echo view('layout/mobilemenubar');
                echo view('layout/mobilesidebarmenu');
                echo view('custumers.view', compact('products', 'brands'));
                echo view('layout/footer');
                echo view('layout/script');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function product($nameproduc)
    {


        if (Product::where("name", $nameproduc)->exists()) {
            $products  = Product::where("name", $nameproduc)->first();
            $carts = Cart::count();
            $categories = Category::all();
            $brands = Brand::all();
            echo view('layout/header', compact('carts'));
            echo view('layout/navbar', compact('categories'));
            echo view('layout/mobilemenubar');
            echo view('layout/mobilesidebarmenu');
            echo view('custumers.view', compact('products', 'brands'));
            echo view('layout/footer');
            echo view('layout/script');
        } else {
            return redirect('/');
        }
    }
}
