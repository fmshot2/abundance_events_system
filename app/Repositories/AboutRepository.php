<?php

namespace App\Repositories;

use App\Interfaces\AboutRepositoryInterface;
use App\Models\About;

class AboutRepository implements AboutRepositoryInterface
{
    public function getAllAbouts()
    {
       $about = About::first();

       // if a record was found
       if ($about) {

        return $about;
       } else { 
           #if no record was found
           return false;
       }
   }

    public function getAboutById($aboutId)
    {
        return About::findOrFail($aboutId);
    }

    public function deleteAbout($aboutId)
    {
        // About::destroy($aboutId);
        $response = About::findOrFail($aboutId);
        $response->delete();
        return $response;

    }

    public function createAbout(array $aboutDetails)
    {
        return About::create($aboutDetails);
    }

    public function updateAbout($aboutId, array $newDetails)
    {
        $response =  About::findOrFail($aboutId);

        $response->update($newDetails);
        
        return $response;
    }
}
