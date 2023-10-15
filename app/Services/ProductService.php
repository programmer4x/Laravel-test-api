<?php

namespace App\Services;

use App\Models\Media;
use App\Repositories\Media\MediaRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    protected object $productRepository;
    protected object $mediaRepository;

    public function __construct()
    {
        $this->productRepository = app()->make(ProductRepositoryInterface::class);
        $this->productRepository = app()->make(MediaRepositoryInterface::class);
    }

    public function create($request)
    {
        $product = $this->productRepository->createProduct($request);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $i => $image) {
                $imagePath = $image->store('images');
                $this->mediaRepository->createMedia($request,$product,$image,$imagePath);
            }
        }
        return $product;
    }

    public function update($product, $request)
    {
        if ($product && Auth::user()->id == $product->user_id) {
            $product = $this->productRepository->updateProduct($product, $request);

            if ($request->deletedMedia) {
                    foreach ($request->deletedMedia as $mediaId) {
                        $media = $this->mediaRepository->getMediaById($mediaId);
                            Storage::delete($media->image);
                            $this->mediaRepository->deleteMedia($media);
                    }
            }

            if ($request->file('image')) {
                foreach ($request->file('image') as $i => $image) {
                    $imagePath = $image->store('images');
                    $this->mediaRepository->createMedia($request,$product,$image,$imagePath);
                }
            }

            return $product;
        }

        return response([
            'massage' => 'شما اجازه تغییر در این ارایه را ندارید!'
        ]);
    }

    public function destroy($product)
    {
        if ($product && Auth::user()->id == $product->user_id) {

            foreach ($product->media as $media) {
                //deleted in host//
                Storage::delete($media->image);
                $this->mediaRepository->deleteMedia($media);
            }

            $this->productRepository->deleteProduct($product);
            return response([
                'message' => 'محصول حذف شد!',
                'status' => 'success'
            ]);
        }
        return response([
            'message' => 'محصول مورد نظر وجود ندارد!',
            'status' => 'error'
        ]);
    }
}
