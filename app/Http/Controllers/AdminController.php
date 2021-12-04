<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
     public function product()
     {
         if (Auth::id())
         {
             return view('admin.product');
         }
         else
         {
            return redirect('/login');
         }

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

         notify()->success('Product Added Successfully ⚡️');

         return redirect()->back();

     }

     public function showproduct()
     {
         $data = Product::paginate(5);

         return view('admin.showproduct', compact('data'));
     }

     public function updateproduct($id)
     {
        $data = Product::find($id);


        return view('admin.updateproduct', compact('data'));
     }

     public function deleteproduct($id)
     {
        $data = Product::find($id);

        $data->delete();
        notify()->success('Product Deleted Successfully ⚡️');
        // emotify('success', 'Product Deleted Successfully');
        return redirect()->back();
     }

     public function updateviewproduct(Request $request, $id)
     {
        $data = Product::find($id);

        $image = $request->file;

        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->file->move('productimage', $imagename);

            $data->image = $imagename;
        }

         $data->title = $request->title;
         $data->price = $request->price;
         $data->description = $request->des;
         $data->quantity = $request->quantity;

         $data->save();

         notify()->success('Product Updated Successfully ⚡️');

         return redirect('/showproduct');
     }

     public function showorder()
     {
         $orders = Order::all();

         return view('admin.showorder', compact('orders'));
     }

     public function updatestatus($id)
     {
         $order = Order::findOrFail($id);

         $order->status = 'Delivered';
         $order->save();

         return redirect()->back();
     }

}
