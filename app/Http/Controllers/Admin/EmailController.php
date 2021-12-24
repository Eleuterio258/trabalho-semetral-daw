<?php

namespace App\Http\Controllers\Admin;

use App\Mail\ProductMailer;
use App\Models\Product;
use Illuminate\Http\Request;
use Mail;
use App\Http\Controllers\Controller;
class EmailController extends Controller
{
    public function sendMailForm(){
        $products = Product::all();
        return view('admin.email.email-form', compact('products'));
    }

    public function sendMail(Request $request){
        $product = Product::find($request->input('product'));
        $product->subject = $request->input('emailSubject');
        Mail::to('contact.lutforrahman@gmail.com')->cc(['info@lutforrahman.com'])->send(new ProductMailer($product));
        return 'success';
    }
}
