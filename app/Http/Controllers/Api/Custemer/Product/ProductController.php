<?php

namespace App\Http\Controllers\Api\Custemer\Product;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function popularProduct()
    {
        $products = Product::where("rating", 5)->get();
        $product = [];
        foreach ($products as $item) {

            $data = [
                "id" => $item->id,
                "name" => $item->name,
                "price" => $item->price,
                "description" => $item->description,
                "category" => $item->category->name,
                "stock" => $item->stock,
                "rating" => $item->rating,
                "image" => $item->image
            ];

            array_push($product, $data);
        }

        return response()->json($product, 200);
    }

    public function index()
    {

        $products = Product::all()->where('stock', '>', '0');

        $product = [];
        foreach ($products as $item) {

            $data = [
                "id" => $item->id,
                "name" => $item->name,
                "price" => $item->price,
                "description" => $item->description,
                "category" => $item->category->name,
                "stock" => $item->stock,
                "rating" => $item->rating,
                "image" => $item->image
            ];

            array_push($product, $data);
        }

        return response()->json($product, 200);
    }
    public function stockout()
    {

        $products = Product::all()->where('stock', '=', '0');
        $product = [];
        foreach ($products as $item) {

            $data = [
                "id" => $item->id,
                "name" => $item->name,
                "price" => $item->price,
                "description" => $item->description,
                "category" => $item->category->name,
                "stock" => $item->stock,
                "rating" => $item->rating,
                "image" => $item->image
            ];

            array_push($product, $data);
        }

        return response()->json($product, 200);
    }
    public function getProductById($id)
    {
        if (Product::where('id', $id)->exists()) {
            $products = Product::where('id', $id)->get();

            $product = [];
            foreach ($products as $item) {

                $data = [
                    "id" => $item->id,
                    "name" => $item->name,
                    "price" => $item->price,
                    "description" => $item->description,
                    "category" => $item->category->name,
                    "stock" => $item->stock,
                    "rating" => $item->rating,
                    "image" => $item->image
                ];

                array_push($product, $data);
            }
            return response()->json($product, 200);
        }else {
            return response()->json(['success' => 'Product is not exist'], 200);
        }
    }

    public function searchProduct($name)
    {


        if (Product::where('name', 'like', '%' . $name . '%')->exists()) {
            $products = Product::where('name', 'like', '%' . $name . '%')->get();


            $product = [];
            foreach ($products as $item) {

                $data = [
                    "id" => $item->id,
                    "name" => $item->name,
                    "price" => $item->price,
                    "description" => $item->description,
                    "category" => $item->category->name,
                    "stock" => $item->stock,
                    "rating" => $item->rating,
                    "image" => $item->image
                ];

                array_push($product, $data);
            }

            return response()->json($product, 200);
        } else {
            return response()->json(['success' => 'Product is not exist'], 200);
        }
    }

    public function getHotProducts()
    {
        $product = Product::where('is_hot', 1)->get();
        return $product;
    }

    public function getNewArrival()
    {
        $product = Product::where('is_new', 1)->get();
        return $product;
    }

    public function getByCategoryId($categoryId)
    {

        if (Product::where('category_id', $categoryId)->exists()) {
            $products = Product::where('category_id', $categoryId)->get();

            $product = [];
            foreach ($products as $item) {

                $data = [
                    "id" => $item->id,
                    "name" => $item->name,
                    "price" => $item->price,
                    "description" => $item->description,
                    "category" => $item->category->name,
                    "stock" => $item->stock,
                    "rating" => $item->rating,
                    "image" => $item->image
                ];

                array_push($product, $data);
            }

            return response()->json($product, 200);
        } else {
            return response()->json(['success' => 'Category is not exist'], 200);
        }
    }
    public function getByCategorynome($namecat, $nameproduc)
    {


        
        if (Category::where("name", $namecat)->exists()) {

            if (Product::where("name", $nameproduc)->exists()) {
                $products  = Product::where("name", $nameproduc)->first();
                $categories = Category::all();
  
         
                return response()->json(['success' => 'Category is not exist'], 200);
              
            } else {
                return response()->json(['success' => 'Category is not exist'], 200);
            }
        } else {
            return response()->json(['success' => 'Category is not exist'], 200);
        }

    }
}
