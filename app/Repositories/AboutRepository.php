<?php

namespace App\Repositories;

use App\Interfaces\AboutRepositoryInterface;
use App\Models\About;

class AboutRepository implements AboutRepositoryInterface
{
    public function getAllAbouts()
    {
        return $about = About::first();

        if($about){
            $about = $about->toJson(JSON_PRETTY_PRINT);
            return response($about, 200);
           }
           else{
               return response()->json([
                   "message" => "About not found",
                 ], 404);
           }
    }

    // $footballer = Footballer::find($id);*/
    

    public function getAboutById($aboutId)
    {
        return About::findOrFail($aboutId);
    }

    public function deleteAbout($aboutId)
    {
        About::destroy($aboutId);
    }

    public function createAbout(array $aboutDetails)
    {
        return About::create($aboutDetails);
    }

    public function updateAbout($aboutId, array $newDetails)
    {
        return About::whereId($aboutId)->update($newDetails);
    }
}
