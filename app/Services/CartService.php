<?php

namespace App\Services;

use App\Repositories\Cart\CartRepository;
use App\Repositories\Cart\CartRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CartService
{
    private object $CartRepository;
    public function __construct()
    {
        $this->CartRepository = app()->make(CartRepositoryInterface::class);
    }

    public function create($request)
    {
        return $this->CartRepository->createCart($request);
    }

    public function update($cart, $request)
    {
        if (Auth::user()->id == $cart->user_id){
            return $this->CartRepository->updateCart($cart , $request);
        }
        return response([
            'massage' => 'شما نمیتونید این سبد خرید را بروزرسانی کنید!',
            'status'  => 'error',
        ]);

    }

    public function destroy($cart)
    {
        if (Auth::user()->id == $cart->user_id){
            $this->CartRepository->deletedCart($cart);
            return response([
                'message' => 'سبد خرید حذف شد!',
                'status'  => 'success'
            ]);
        }
        return response([
            'message' => 'شما اجازه حذف این سبد خرید را ندارید!',
            'status'  => 'error'
        ]);
    }
}
