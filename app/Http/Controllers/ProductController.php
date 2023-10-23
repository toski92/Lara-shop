<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::simplePaginate(9);
        return view('product', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);

        Product::create([
            'user_id'=>Auth()->id(),
            'title'=>$request->title,
            'description'=>$request->description,
            'excerpt'=>$request->excerpt,
            'feature_image'=>$request->file('feature_image')->store('public'),
            'regular_price'=>$request->regular_price,
            'sale_price'=>$request->sale_price,
            'quantity'=>$request->quantity
        ]);
        return redirect(route('product'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return view('single-product', ['product' => $product]);
        }else {
            abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
