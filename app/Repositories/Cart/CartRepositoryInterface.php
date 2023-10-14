<?php

namespace App\Repositories\Cart;

interface CartRepositoryInterface
{
    public function getAllCart();
    public function createCart();
    public function updateCart();
}
