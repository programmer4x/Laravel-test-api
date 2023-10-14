<?php

namespace App\Services;

use App\Models\Media;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function create($request)
    {
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'score' => $request->score,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
        ]);
        $product->load('category');

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $i => $image) {
                $imagePath = $image->store('images');

                Media::create([
                    'product_id' => $product->id,
                    'title' => $request->title[$i],
                    'image' => $imagePath,
                    'size' => $image->getsize(),
                ]);
            }
        }
        return $product;
    }

    public function update($product, $request)
    {
        if ($product && Auth::user()->id == $product->user_id) {

            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'status' => $request->status,
                'score' => $request->score,
                'category_id' => $request->category_id,
            ]);

            if ($request->deletedMedia) {
                    foreach ($request->deletedMedia as $mediaId) {
                        $media = Media::find($mediaId);
                            Storage::delete($media->image);
                            $media->delete();
                    }
            }

            if ($request->file('image')) {
                foreach ($request->file('image') as $i => $image) {
                    $imagePath = $image->store('images');

                    Media::create([
                        'product_id' => $product->id,
                        'title' => $request->title,
                        'image' => $imagePath,
                        'size' => $image->getsize(),
                    ]);
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
                $media->delete();
            }

            $product->delete();
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
