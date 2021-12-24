<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandConttroller extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }


    public function create()
    {
        return view('admin.brand.create');
    }


    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->input('name');
        $brand->description = $request->input('description');
        $brand->save();

        return redirect()->back()->with('success', 'brand information inserted successfully!');
        // }
        // return redirect()->back()->with('failed', 'brand information could not insert!');
    }


    public function show(Brand $brand)
    {
        //
    }


    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }


    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->input('name');
        $brand->description = $request->input('description');
        $brand->save();
        return redirect()->back()->with('success', 'brand information updated successfully!');
        // }
        // return redirect()->back()->with('failed', 'brand information could not update!');
    }


    public function destroy($id)
    {
        if (Brand::destroy($id)) {
            return redirect()->back()->with('deleted', 'Deleted successfully');
        }
        return redirect()->back()->with('delete-failed', 'Could not delete');
    }
}
