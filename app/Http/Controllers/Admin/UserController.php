<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class UserController extends Controller
{
   
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

   
    public function create()
    {
        return view('admin.user.create');
    }

  
    public function store(Request $request)
    {
        $user = new User();
        $user->title = $request->input('userTitle');
        $user->message = $request->input('userMessage');
        $user->image_url = "";
        if($user->save()){
            $photo = $request->file('userImage');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(10000, 50000) . '.' . $ext;
                if($ext == 'jpg' || $ext == 'png'){
                    if($photo->move(public_path(), $fileName)){
                        $user = User::find($user->id);
                        $user->image_url = url('/') . '/public/' . $fileName;
                        $user->save();
                    }
                }
            }
            return redirect()->back()->with('success', 'user information inserted successfully!');
        }
        return redirect()->back()->with('failed', 'user information could not insert!');
    }

  
    public function show(User $user)
    {
        //
    }

  
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

  
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->title = $request->input('userTitle');
        $user->message = $request->input('userMessage');
        if($user->save()){
            $photo = $request->file('userImage');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(10000, 50000) . '.' . $ext;
                if($ext == 'jpg' || $ext == 'png'){
                    if($photo->move(public_path(), $fileName)){
                        $user = User::find($user->id);
                        $user->image_url = url('/') . '/public/' . $fileName;
                        $user->save();
                    }
                }
            }
            return redirect()->back()->with('success', 'user information updated successfully!');
        }
        return redirect()->back()->with('failed', 'user information could not update!');
    }

  
    public function destroy($id)
    {
        if(User::destroy($id)){
            return redirect()->back()->with('deleted', 'Deleted successfully');
        }
        return redirect()->back()->with('delete-failed', 'Could not delete');
    }
}
