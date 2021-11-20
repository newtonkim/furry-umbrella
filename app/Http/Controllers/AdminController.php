<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function product()
     {
        return view('admin.product');
     }

     public function uploadproduct(Request $request)
     {
         $data = new Product;

         $image = $request->file;

         $imagename = time().'.'.$image->getClientOriginalExtension();

         $request->file->move('productimage', $imagename);

         $data->image = $imagename;


         $data->title = $request->title;
         $data->price = $request->price;
         $data->description = $request->des;
         $data->quantity = $request->quantity;

         $data->save();

         return redirect()->back()->with('success','Product Added Successfully! ⚡️');

     }
}
