<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class ApiController extends Controller
{
   public function product_index(){
    $product= Product::get();
    return response()->json($product);
   }

   public function product_store(Request $request){
    Product::insert([
        'product' =>$request->api_product,
        'price'   =>$request->api_price,
        'stock'   =>$request->api_stock,
    ]);
    $response =array(
        'responseCode' => '00',
        'responseStatus' => 'Success'
    );
    return response()->json($response);
   }

   public function product_by_id($id){
    $product = Product::where('id', $id)->get();
    return response()->json($product);

   }
   public function product_delete($id){
    $product = Product::where('id', $id)->delete();

    $response =array(
        'responseCode' => '00',
        'responseStatus' => 'Success Delete'
    );
    return response()->json($product);

}

public function produk_update(Request $request, $id)
    {
        // Validation logic can be added here

        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['Success' => 'Success Update']);
        }

        $produk->update([
            'produk' => $request->api_produk,
            'price'  => $request->api_price,
            'stock'  => $request->api_stock,
        ]);

        $response = [
            'responseCode'   => '00',
            'responseStatus' => 'Success Update'
        ];
        return response()->json($response);
    }

    public function category_index()
    {
       $category = Category::get();
        return response()->json($category);
    }

    public function category_store(Request $request){
        DB::table('tests')->insert([
            'name'          => $request->api_name,
                'category_id'   => $request->api_category_id,
                'price'         =>$request->api_price,
                'desc'          =>$request->api_desc,
                'image'          =>$request->api_image,
                'created_at'      =>$request->api_created_at,
                'update_at'      =>$request->api_update_at,
        ]);
        $response= array(
            'responseCode' => '00',
            'responseStatus' => 'Success'
        );
        return response()->json($response);
    }
        
   public function category_by_id($id){
    $category = Category::where('id', $id)->get();
    return response()->json($category);

   }
   public function category_delete($id){
    $category = Category::where('id', $id)->delete();

    $response =array(
        'responseCode' => '00',
        'responseStatus' => 'Success Delete'
    );
    return response()->json($product);

}

public function category_update(Request $request, $id)
    {
        // Validation logic can be added here

        $category = Category::find($id);

        if (!$category) {
            return response()->json(['Success' => 'Success Update']);
        }

        $category->update([
                'name'          => $request->api_name,
                'category_id'   => $request->api_category_id,
                'price'         =>$request->api_price,
                'desc'          =>$request->api_desc,
                'image'          =>$request->api_image,
                'created_at'      =>$request->api_created_at,
                'update_at'      =>$request->api_update_at,


        ]);

        $response = [
            'responseCode'   => '00',
            'responseStatus' => 'Success Update'
        ];
        return response()->json($response);
    }
}


