<?php

namespace App\Http\Controllers\Ecommerce;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function index(Product $product)
    {
        return view('ecommerce.product')->with('product', $product);
    }
}
