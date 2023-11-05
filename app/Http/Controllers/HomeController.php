<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function product()
    {
        return view('products' , [
                'products' => Product::all() ,
        ]);
    }
}
