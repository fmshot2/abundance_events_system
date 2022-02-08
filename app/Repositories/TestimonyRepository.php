<?php

namespace App\Repositories;

use App\Interfaces\TestimonyRepositoryInterface;
use App\Models\Testimony;

class TestimonyRepository implements TestimonyRepositoryInterface
{
    public function getAllTestimonies()
    {

        return Testimony::all();
    }

    public function getTestimonyById($testimonyId)
    {
        return Testimony::findOrFail($aboutId);
    }

    public function deleteTestimony($testimonyId)
    {
        Testimony::destroy($aboutId);
    }

    public function createTestimony(array $testimonyDetails)
    {
        return Testimony::create($aboutDetails);
    }

    public function updateTestimony($testimonyId, array $newDetails)
    {
        $response =  Testimony::findOrFail($aboutId)
        $response->update($newDetails);
        return $response;
    }

    // public function getFulfilledOrders()
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
