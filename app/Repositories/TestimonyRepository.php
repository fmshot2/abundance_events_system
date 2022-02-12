<?php

namespace App\Repositories;

use App\Interfaces\TestimonyRepositoryInterface;
use App\Models\Testimony;

class TestimonyRepository implements TestimonyRepositoryInterface
{
    public function getAllTestimonies()
    {

        return Testimony::orderBy('id', 'ASC')->get();
    }

    public function getTestimonyById($testimonyId)
    {
        return Testimony::findOrFail($testimonyId);
    }

    public function deleteTestimony($testimonyId)
    {
        // Testimony::destroy($testimonyId);
        $response = Testimony::findOrFail($testimonyId);
        $response->delete();
        return $response;
    }

    public function createTestimony(array $testimonyDetails)
    {
        return Testimony::create($testimonyDetails);
    }

    public function updateTestimony($testimonyId, array $newDetails)
    {
        $response =  Testimony::findOrFail($testimonyId);
        $response->update($newDetails);
        return $response;
    }

    // public function getFulfilledOrders()
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
