<?php

namespace App\Repositories\Media;

use App\Models\Media;

class MediaRepository implements MediaRepositoryInterface
{

    public function createMedia($request,$product,$image,$imagePath)
    {
        Media::create([
            'product_id' => $product->id,
            'title' => $request->title,
            'image' => $imagePath,
            'size' => $image->getsize(),
        ]);
    }

    public function getMediaById($MediaId)
    {

    }

    public function deleteMedia($media)
    {
        $media->delete();
    }

}
