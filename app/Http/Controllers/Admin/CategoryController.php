<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('categoryName');



        if ($request->hasfile('image_url')) {
            $file = $request->file('image_url');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/category/', $filename);
            $category->image_url = 'http://localhost/public/images/category/' . $filename;
        }

        if ($request->hasfile('icon')) {
            $file = $request->file('icon');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/icons/', $filename);
            $category->icon = 'http://localhost/public/images/icons/' . $filename;
        }
        $category->save();
        return redirect()->back()->with('success', 'Saved successfully!');
    }


    public function show(Category $category)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('categoryName');



        if ($request->hasfile('image_url')) {
            $file = $request->file('image_url');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/category/', $filename);
            $category->image_url = 'http://localhost/public/images/category/' . $filename;
        }

        if ($request->hasfile('icon')) {
            $file = $request->file('icon');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/icons/', $filename);
            $category->icon = 'http://localhost/public/images/icons/' . $filename;
        }
        // }
        // return redirect()->back()->with('failed', 'Could not update!');
    }


    public function destroy($id)
    {
        if (Category::destroy($id)) {
            return redirect()->back()->with('deleted', 'Deleted successfully');
        }
        return redirect()->back()->with('delete-failed', 'Could not delete');
    }
}
