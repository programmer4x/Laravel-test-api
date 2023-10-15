<?php

namespace App\Repositories\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProduct()
    {
        return Product::with('category' , 'media')->get();
    }

    public function createProduct($request)
    {
         return Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'score' => $request->score,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
        ])->load('category');
    }

    public function updateProduct($product, $request)
    {
        return $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'score' => $request->score,
            'category_id' => $request->category_id,
        ]);
    }

    public function deleteProduct($product)
    {
        return $product->delete();
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function getProductCategory($CategoryId)
    {
       return Category::find($CategoryId);
    }

    public function getProductUserById($UserId)
    {
        return User::find($UserId);
    }
}
