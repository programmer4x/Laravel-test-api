<?php

namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    public function getAllProduct();
    public function createProduct($request);
    public function updateProduct($product,$request);
    public function deleteProduct($media);
    public function getProductById($id);
    public function getProductCategory($CategoryId);
    public function getProductUserById($UserId);
}
