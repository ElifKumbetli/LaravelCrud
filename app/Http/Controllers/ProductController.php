<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    
    public function index()
    {
       $products = Product::all();
       return view('index',compact('products'));
    }

    
    public function create()
    {
       return view('create');
    }

    
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect('product');
    }

   
    public function show($id)
    {
        $product = Product::FindOrFail($id);
        return view('show',compact('product'));
    }

  
    public function edit($id)
    {
        $product = Product::FindOrFail($id);
        return view('update',compact('product'));
    }

    
    public function update(Request $request, $id)
    {
        $product=Product::FindOrFail($id);
        $product->update($request->all());
        return redirect('product');
    }

    
    public function destroy($id)
    {
      $product=Product::FindOrFail($id);
      $product->delete();
      return redirect('product');
    }
}
