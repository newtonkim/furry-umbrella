<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {

            return view('admin.home');

        } else {

            $data = Product::orderBy('created_at', 'desc')->paginate(3);
            $user = auth()->user();
            $count = Cart::where('phone', $user->phone)->count();

            return view('user.home', compact('data', 'count'));
        }

    }

    public function index()
    {
        if (Auth::id()) {

            return redirect('/redirect');

        } else {

            $data = Product::orderby('created_at', 'desc')->paginate(3);

            return view('user.home', compact('data'));
        }

    }

    public function search(Request $request)

    {
        $search = $request->search;
        // condition for the search to return all item if search button is clicked with no data
        if ($search == '') {

            $data = Product::orderby('created_at', 'desc')->paginate(3);

            return view('user.home', compact('data'));
        }

        $data = Product::where('title', 'Like', '%'.$search. '%')->get();

        return view('user.home', compact('data'));

    }

    public function addcart(Request $request, $id)
    {
        // check if the user is logged in or not
        if (Auth::id()) {

            //get authenticated user
            $user = auth()->user();

            $product = Product::find($id);

            // create a new cart with details from user and product tables
            $cart = new Cart;

            // get authenticated user name
            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->save();
            notify()->success('Product Added Successfully to the Cart ⚡️');
            return redirect()->back();

        } else {

            return redirect('login');
        }

    }

    public function showcart()
    {
        $user = auth()->user();
        $carts = Cart::where('phone', $user->phone)->get();
        $count = Cart::where('phone', $user->phone)->count();

        return view('user.showcart', compact('count', 'carts'));
    }

    public function deletecart($id)
    {

        $cart_item = Cart::findOrFail($id);

        $cart_item->delete();
        notify()->success('Product Removed from Cart Successfully ⚡️');

        return redirect()->back();
    }

    public function confirmorder(Request $request)
    {
        $user = auth()->user();

        $name = $user->name;

        $phone = $user->phone;

        $address = $user->address;

        foreach($request->productname as $key=>$productname)
        {
            $order = new Order;

            $order->product_name = $request->productname[$key];
            $order->quantity = $request->quantity[$key];
            $order->price = $request->price[$key];
            $order->name = $name;
            $order->phone = $phone;
            $order->address = $address;
            $order->status = 'Pending Delivery';

            notify()->success('Products Ordered Successfully⚡️');
            $order->save();
        }
        // Clear carts table  and store the data to order table after order has been confirmed
        DB::table('carts')->where('phone', $phone)->delete();

        return redirect()->back();
    }
}
