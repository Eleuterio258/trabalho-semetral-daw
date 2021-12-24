<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SliderController extends Controller
{
   
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

   
    public function create()
    {
        return view('admin.slider.create');
    }

  
    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->title = $request->input('sliderTitle');
        $slider->message = $request->input('sliderMessage');
        $slider->image_url = "";
        if($slider->save()){
            $photo = $request->file('sliderImage');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(10000, 50000) . '.' . $ext;
                if($ext == 'jpg' || $ext == 'png'){
                    if($photo->move(public_path(), $fileName)){
                        $slider = Slider::find($slider->id);
                        $slider->image_url = url('/') . '/public/' . $fileName;
                        $slider->save();
                    }
                }
            }
            return redirect()->back()->with('success', 'Slider information inserted successfully!');
        }
        return redirect()->back()->with('failed', 'Slider information could not insert!');
    }

  
    public function show(Slider $slider)
    {
        //
    }

  
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

  
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->title = $request->input('sliderTitle');
        $slider->message = $request->input('sliderMessage');
        if($slider->save()){
            $photo = $request->file('sliderImage');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(10000, 50000) . '.' . $ext;
                if($ext == 'jpg' || $ext == 'png'){
                    if($photo->move(public_path(), $fileName)){
                        $slider = Slider::find($slider->id);
                        $slider->image_url = url('/') . '/public/' . $fileName;
                        $slider->save();
                    }
                }
            }
            return redirect()->back()->with('success', 'Slider information updated successfully!');
        }
        return redirect()->back()->with('failed', 'Slider information could not update!');
    }

  
    public function destroy($id)
    {
        if(Slider::destroy($id)){
            return redirect()->back()->with('deleted', 'Deleted successfully');
        }
        return redirect()->back()->with('delete-failed', 'Could not delete');
    }
}
