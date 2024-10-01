<?php

namespace App\Http\Controllers\Ecommerce;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfiguradorPCController extends Controller
{
        /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
    
    public function index()
    {   
        $products = Product::all();
        return view('ecommerce.configuradorpc', compact('products'))->withTitle('E-COMMERCE STORE | CONFIGURADOR PC');
    }

    public function shop()
    {
        $products = Product::all();
        return view('welcome')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
