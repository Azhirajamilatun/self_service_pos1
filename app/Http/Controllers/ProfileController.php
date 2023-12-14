<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;



class ProductController extends Controller
{
    public function index()
    {
        $product = Product::get();
        return view('product.index', compact('product'));
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product'   => 'required|min:6',
            'price'     => 'required|min:4',
            'stock'     => 'required|min:1',
        ], [
            'product.required' => 'Nama Produk harus di isi.',
            'price.required' => 'Harga harus di isi.',
            'stock.required' => 'Stock harus di isi.',
        ]);

        $validator->validate();
        Product::create([
            'product'       => $request->product,
            'price'       => $request->price,
            'stock'       => $request->stock,
        ]);

        return redirect('/product');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }
    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->product = $request->product;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        return redirect('/product')->with('success', 'Data produk berhasil di update');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return redirect('/product')->with('success', 'Data produk berhasil di delete');
        } else {
            return redirect('/product')->with('success', 'Data produk gagal di delete');
        }
    }
    //   public function show ($product)
    //   {
    //     $product =  Product::findOrFail($product);

    //     return view('product.show', compact('product'));
    //   }
    //   public function edit($id)
    //   {
    //     $product =  Product::findOrFail($product);

    //     return view('product.edit', compact('product'));
    //   }
    //   public function DB::update(Request $request,$product);
    //   {
    //     $result = Product::find($product);

    //     $validateData = $request->validate(
    //         [

    //         ]
    //     )
    //   }
}