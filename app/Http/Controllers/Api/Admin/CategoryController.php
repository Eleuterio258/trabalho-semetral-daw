<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{

    public function index()
    {

        $category = Category::all();
        return $category;
    }

    public function store(Request $request)
    {


        try {
            $category = new Category;

            $category->name = $request->input('name');

            if ($request->hasfile('image_url')) {
                $file = $request->file('image_url');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('public/images/category/', $filename);
                $category->image_url = $filename;
            }
            $category->save();
            return ['status' => 'category  Added Successfully'];
        } catch (\Exception $e) {
            return ['status' => $e];
        }
    }



    public function update(Request $request, $id)
    {
        $category = Category::find($id);


        $category->name = $request->input('name');


        if ($request->hasfile('image_url')) {
            $destination = 'public/uploads/' . $category->image_url;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image_url');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('public/uploads/', $filename);
            $category->image_url = $filename;
        }

        $category->update();
        return redirect()->back()->with('status', 'category Updated Successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $destination = 'public/uploads/' . $category->image_url;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $category->delete();
        return redirect()->back()->with('status', 'category  Deleted Successfully');
    }
}
