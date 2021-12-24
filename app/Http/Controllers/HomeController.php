<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

  


    public function index()
    {

        $categories = Category::all();
        $products = Product::where('stock', '>', '0');
        $brands = Brand::all();
        $carts = Cart::count();
        echo view('layout/header', compact('carts'));
        echo view('layout/navbar', compact('categories'));
        echo view('layout/mobilemenubar');
        echo view('layout/mobilesidebarmenu');
        echo view('layout/banner');
        echo view('custumers.home', compact(['categories', 'brands', 'products']));
        echo view('layout/footer');
        echo view('layout/script');
    }

  
    public function home()
    {

        $categories = Category::all();
        $products = Product::where('stock', '>', '0')->get();
        $brands = Brand::all();
        $carts = Cart::count();
        echo view('layout/header', compact('carts'));
        echo view('layout/navbar', compact('categories'));
        echo view('layout/mobilemenubar');
        echo view('layout/mobilesidebarmenu');
        echo view('layout/banner');
        echo view('custumers.home', compact(['categories', 'brands', 'products']));
        echo view('layout/footer');
        echo view('layout/script');
    }

    public function shop()
    {


        $categories = Category::all();
        $products = Product::where('stock', '>', '0')->get();
        $carts = Cart::count();
        $brands = Brand::all();
        echo view('layout/header', compact('carts'));
        echo view('layout/navbar', compact('categories'));
        echo view('layout/mobilemenubar');
        echo view('layout/mobilesidebarmenu');
        echo view('custumers.shop', compact(['categories', 'brands', 'products']));
        echo view('layout/footer');
        echo view('layout/script');
    }

    
}
