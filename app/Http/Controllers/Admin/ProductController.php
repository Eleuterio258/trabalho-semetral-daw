<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
  
    public function index()
    {
        $products = Product::all();
         
        return view('admin.product.index', compact('products'));
    }

  
    public function create()
    {
       $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.create', compact('categories','brands'));
    }

 
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('productName');
        $product->price = $request->input('productPrice');
        $product->stock = $request->input('productStock');
        $product->description= $request->input('producDescription');

        $product->is_hot = $request->input('isHot') ? true : false;
        $product->is_new = $request->input('isNew') ? true : false;
        $product->category_id = $request->input('category');
        $product->sku = 'UXKZT' . rand(1111, 9999);
        $product->brand_id = $request->input('brand');
   
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/products/', $filename);
            $product->image = 'http://localhost/public/images/products/' . $filename;
        }
            return redirect()->back()->with('success', 'Product information inserted successfully!');
        // }
        // return redirect()->back()->with('failed', 'Product information could not be inserted!');
    }

 
    public function show(Product $product)
    {
        //
    }

  
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('productName');
        $product->price = $request->input('productPrice');
        $product->discount = $request->input('productDiscount');
        $product->detail = $request->input('productDetail');
        $product->is_hot_product = $request->input('isHotProduct') ? true : false;
        $product->is_new_arrival = $request->input('isNewArrival') ? true : false;
        $product->category_id = $request->input('category');
        $product->user_id = 0;
        if($product->save()){
            $photo = $request->file('productPhoto');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(10000, 50000) . '.' . $ext;
                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
                    if($photo->move(public_path(), $fileName)){
                        $product = Product::find($product->id);
                        $product->photo = url('/') . '/public/' . $fileName;
                        $product->save();
                    }
                }
            }
            return redirect()->back()->with('success', 'Product information updated successfully!');
        }
        return redirect()->back()->with('failed', 'Product information could not update!');
    }


    public function destroy($id)
    {
        if(Product::destroy($id))
        {
            return redirect()->back()->with('deleted', 'Deleted successfully');
        }
        return redirect()->back()->with('delete-failed', 'Could not delete');
    }
}
