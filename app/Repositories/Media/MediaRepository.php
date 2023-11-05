<?php

namespace App\Repositories\Media;

use App\Models\Media;

class MediaRepository implements MediaRepositoryInterface
{

    public function createMedia($request,$product,$image,$imagePath)
    {
        return Media::create([
            'product_id' => $product->id,
            'title' => $request->title,
            'image' => $imagePath,
            'size' => $image->getsize(),
        ]);
    }

    public function getMediaById($MediaId)
    {
        return Media::find($MediaId);
    }

    public function deleteMedia($media)
    {
        return $media->delete();
    }

}
