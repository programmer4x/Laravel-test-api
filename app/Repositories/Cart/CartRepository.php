<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartRepository implements CartRepositoryInterface
{
    public function create($request)
    {
        return Cart::create([
            'product_id'  => $request->product_id,
            'user_id'     => Auth::user()->id,
            'number'      => $request->number,
            'total_price' => Product::find($request->product_id)->price,
            'status'      => $request->status,
        ]);
    }

}
