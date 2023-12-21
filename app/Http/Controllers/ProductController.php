<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\product;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //public function_construct(){
   //$this->middleware ('user')->except('destroy');
//} 
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $product = product::get();

        //render view with posts
        return view('product.index', compact('product'));
    }
    public function create(){
        return view('product.create');
    }
    public function store(Request $request){
        product::create([
            'product' => $request->product,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect('/product');
    }
    public function edit($id)
    {
    $product = Product::find($id);
    return view('product.edit', compact('product'));
    }
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect('/product')->with('error', 'Product tidak ditemukan');
        }

        $product->delete();

        return redirect('/product')->with('success', 'Product berhasil dihapus');
    }
    public function update(Request $request, $id)
    {
    $product = Product::find($id);
    $product->update([
        'product' => $request->product,
        'price'   => $request->price,
        'stock'   => $request->stock,
    ]);

    return redirect('/product');
    }
}