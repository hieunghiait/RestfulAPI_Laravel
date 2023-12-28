<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return response()->json([
            'status' => 'success',
            'message' => 'Hello World'
        ]);
    }
    public function listProducts(){
        $products = Product::all();
        return response()->json([
            'status' => 'success',
            'message' => 'List Products',
            'data' => $products
        ]);
    }
    public function createProduct(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        $product = Product::create($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
            'data' => $product
        ]);
    }
    public function getProductById($id){
        $product = Product::find($id);
        if($product){
            return response()->json([
                'status' => 'success',
                'message' => 'Product found',
                'data' => $product
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found',
            ]);
        }
    }
    public function updateProduct(Request $request, $id){
        $product = Product::find($id);
        if($product){
            $product->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Product updated successfully',
                'data' => $product
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found',
            ]);
        }
    }
    public function deleteProduct($id){
        $product = Product::find($id);
        if($product){
            $product->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Product deleted successfully',
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found',
            ]);
        }
    }
}
