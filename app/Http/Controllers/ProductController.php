<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\ProductService;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{

    protected object $productService;
    protected object $productRepository;

    public function __construct(ProductService $productService, ProductRepositoryInterface $productRepository)
    {
        $this->productService    = $productService;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $product = $this->productRepository->getAllProduct();
        return ProductResource::collection($product);
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->create($request);
        return ProductResource::make($product);
    }

    public function update(Product $product, UpdateProductRequest $request)
    {
        $product = $this->productService->update($product, $request);
        return new ProductResource($product);
    }

    public function destroy(Product $product) : mixed
    {
        return $this->productService->destroy($product);
    }
}
