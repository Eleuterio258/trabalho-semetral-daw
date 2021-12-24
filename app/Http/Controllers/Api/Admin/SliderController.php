<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{

    public function index()
    {
        return Slider::all();
    }

    public function store(Request $request)
    {


        try {
            $slider = new Slider;

            $slider->title = $request->input('title');
            $slider->message = $request->input('message');
            if ($request->hasfile('image_url')) {
                $file = $request->file('image_url');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('public/uploads/', $filename);
                $slider->image_url = $filename;
            }
            $slider->save();
            return ['status' => 'slider  Added Successfully'];
        } catch (\Exception $e) {
            return ['status' => $e];
        }
    }



    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);


        $slider->title = $request->input('title');
        $slider->message = $request->input('message');

        if ($request->hasfile('image_url')) {
            $destination = 'public/uploads/' . $slider->image_url;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image_url');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('public/uploads/', $filename);
            $slider->image_url = $filename;
        }

        $slider->update();
        return redirect()->back()->with('status', 'slider Image Updated Successfully');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $destination = 'public/uploads/' . $slider->image_url;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $slider->delete();
        return redirect()->back()->with('status', 'slider Image Deleted Successfully');
    }
}
