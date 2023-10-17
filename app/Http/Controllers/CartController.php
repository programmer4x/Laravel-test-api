<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Requests\Cart\UpdateCartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Repositories\Cart\CartRepositoryInterface;
use App\Services\CartService;
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    protected object $cartService;
    protected object $cartRepository;

    public function __construct(CartService $cartService , CartRepositoryInterface $cartRepository)
    {
        $this->cartService = $cartService;
        $this->cartRepository = $cartRepository;
    }

    public function index()
    {
        $carts = $this->cartRepository->getAllCart();
        return CartResource::collection($carts);
    }

    public function store(StoreCartRequest $request)
    {
        $data = $this->cartService->create($request);
        return new CartResource($data);
    }

    public function update(UpdateCartRequest $request, Cart $cart)
    {
        $data = $this->cartService->update($cart, $request);
        return new CartResource($data);
    }

    public function destroy(Cart $cart)
    {
        return $this->cartService->destroy($cart);
    }
}
