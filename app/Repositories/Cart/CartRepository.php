<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartRepository implements CartRepositoryInterface
{
    public function getAllCart()
    {
        return Cart::all();
    }

    public function createCart($request)
    {
        return Cart::create([
            'product_id'  => $request->product_id,
            'user_id'     => Auth::user()->id,
            'number'      => $request->number,
            'total_price' => Product::find($request->product_id)->price,
            'status'      => $request->status,
        ])->load('product');
    }

    public function updateCart($cart , $request)
    {
        return $cart->update([
            'number'     => $request->number,
            'status'     => $request->status,
            'product_id' => $request->product_id,
        ])->load('product');
    }

    public function deletedCart($cart)
    {
        return $cart->deleted;
    }

    public function getCartById($id)
    {
        return Cart::findOrfail($id);
    }

    public function getUserIdCart($id)
    {
        return User::findOrfail($id);
    }

    public function getStatusCart($id)
    {
        return Cart::find($id)->status ;
    }

    public function getTotalPriceCart($id)
    {
        return Cart::find($id)->total_price;
    }
}
