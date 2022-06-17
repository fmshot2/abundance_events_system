<?php

namespace App\Interfaces;

interface ImageRepositoryInterface
{
    public function getAllImages();
    public function getImageById($imageId);
    public function createImage(array $imagedetails);
    public function updateImage($imageId, array $newDetails);
    public function deleteImage($imageId)

}
?>
