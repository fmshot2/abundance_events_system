<?php

namespace App\Repositories;

use App\Interfaces\AboutRepositoryInterface;
use App\Models\About;

class AboutRepository implements AboutRepositoryInterface 
{
    public function getAllHelps() 
    {
        return Helps::all();
    }

    public function getHelpById($helpId) 
    {
        return Order::findOrFail($helpId);
    }

    public function deleteHelp($helpId) 
    {
        Order::destroy($helpId);
    }

    public function createHelp(array $helpDetails) 
    {
        return Order::create($helpDetails);
    }

    public function updateHelp($helpId, array $newDetails) 
    {
        return Order::whereId($helpId)->update($newDetails);
    }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
