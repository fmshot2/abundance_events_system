<?php

namespace App\Repositories;

use App\Interfaces\ImageRepositoryInterface;
use App\Models\Image;

class ImageRepository implements ImageRepositoryInterface
{
    public function getAllImages()
    {
        $allImages = Image::all();

        if ($allImages) {
            return $allImages;
        } else {
            #if no record was found
            return false;
        }
    }


    public function getImageById($imageId)
    {
        return Image::findOrFail($imageId);
    }

    public function deleteImage($imageId)
    {
        // About::destroy($aboutId);
        $response = Image::findOrFail($imageId);
        $response->delete();
        return $response;

    }

    public function createImage(array $imagedetails)
    {
        return About::create($imagedetails);
    }

    public function updateAbout($imageId, array $newDetails)
    {
        $response =  Image::findOrFail($imageid);

        $response->update($newDetails);

        return $response;
    }
}
?>
