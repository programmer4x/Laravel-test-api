<?php

namespace App\Repositories\Cart;

use App\Models\Cart;

interface CartRepositoryInterface
{
    public function getAllCart();
    public function createCart($request);
    public function updateCart($cart , $request);

    public function deletedCart($id);
    public function getCartById($id);
    public function getUserIdCart($id);
    public function getTotalPriceCart($id);
    public function getStatusCart($id);
}
