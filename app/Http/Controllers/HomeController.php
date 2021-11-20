<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {

            return view('admin.home');

        } else {

            $data = Product::orderBy('created_at', 'desc')->paginate(3);

            return view('user.home', compact('data'));
        }

    }

    public function index()
    {
        if (Auth::id()) {

            return redirect('/redirect');

        } else {

            $data = Product::latest()->first()->paginate(3);

            return view('user.home', compact('data'));
        }

    }
}
