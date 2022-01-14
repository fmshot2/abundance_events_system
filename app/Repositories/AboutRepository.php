<?php

namespace App\Repositories;

use App\Interfaces\AboutRepositoryInterface;
use App\Models\About;

class AboutRepository implements AboutRepositoryInterface
{
    public function getAllAbouts()
    {
        return About::first();
    }

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

    // public function getFulfilledOrders()
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
