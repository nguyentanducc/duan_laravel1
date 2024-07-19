<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function home(){
        $dsSp = Product::limit(3)->get();
        return view('page.home',compact(['dsSp']));
    }
    public function shop(){
        $dsSp = Product::get();
        return view('product.shop',compact(['dsSp']));
    }
}
