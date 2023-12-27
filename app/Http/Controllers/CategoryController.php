<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//import Resource "PostResource"
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->paginate(5);

        //return collection of posts as a resource
        return new CategoryResource(true, 'List Data category', $category);
        // $category = Category::get();
        // return view('category.index', compact('category'));
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|min:5|max:255',
            'category_id'     => 'string',
            'price'     => 'string',
            'desc'     => 'string',
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ], 
        // ,[
        //     'name.required' => 'Nama Produk harus di isi',
        //     'category_id.required' => 'categpry_id harus di isi',
        //     'price' => 'harga harus di masukan',
        //     'desc' => 'descripsi produk harus di isi',
        //     'image.required'   => 'Masukkan Gambar',
        ]);

        // $validator->validate();
        // Category::create([
        //     'name'       => $request->name,
        //     'category_id'       => $request->category_id,
        //     'price'       => $request->price,
        //     'desc'    => $request->desc,
        //     'image'    => $request->image,
        // ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

            //upload image
             $image = $request->file('image');
            $image->storeAs('public/category', $image->hasName());
// creat category
            $category= Category::create([
            'name'       => $request->name,
            'category_id'       => $request->category_id,
            'price'       => $request->price,
            'desc'    => $request->desc,
            'image'    => $image->hasName(),
            ]);

            return new CategoryResource(true, 'Data category bergasil ditambahkan', $category);
        }
        public function show($id)
    {
        //find post by ID
        $category = Category::find($id);

        //return single post as a resource
        return new CategoryResource(true, 'Detail Data Post!', $category);
    }


        public function update(Request $request, $id)
        {
            $validator = Validator::make($request->all(), [
                'name'       => 'requered',
                'category_id' => 'requered'
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
        }
        $category = Category::find($id);

        //check if image is not empty
        if ($request->hasFile('image')) {

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/category', $image->hashName());

            $category->update([
                'name'       => $request->name,
                'category_id'       => $request->category_id,
                'price'       => $request->price,
                'desc'    => $request->desc,
                'image'    => $image->hasName(),

            ]);
        } else {
            $category->update([
                'name'       => $request->name,
                'category_id'       => $request->category_id,
                'price'       => $request->price,
                'desc'    => $request->desc,
            ]);
            return new CategoryResorce(true, 'data category berhasil diubah', $category);
        }
        }
    }











//         }

//         return redirect('/category');
//     }

//     public function edit($id)

//     {
//         $category = Category::find($id);
//         return view('category.edit', compact('category'));
//     }
//     public function update($id, Request $request)
//     {
//         $category = Category::find($id);
//         $category->name = $request->name;
//         $category->category_id = $request->category_id;
//         $category->price = $request->price;
//         $category->categori_id = $request->image;
//         $category->save();
//         return redirect('/category')->with('success', 'data produk berhasil di update');
//     }
//     public function destroy($id)
//     {
//         $category = Category::find($id);
//         if ($category) {
//             $category->delete();
//             return redirect('/category')->with('success', 'Data produk berhasil di delete');
//         } else {
//             return redirect('/category')->with('success', 'Data produk gagal di delete');
//         }
//     }
// }