<?php

namespace App\Repositories\Media;

interface MediaRepositoryInterface
{
    public function createMedia($request,$product,$image,$imagePath);

    public function getMediaById($MediaId);
    public function deleteMedia($media);
}
