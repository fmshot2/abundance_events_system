<?php

namespace App\Repositories;

use App\Interfaces\DetailRepositoryInterface;
use App\Models\Detail;

class DetailRepository implements DetailRepositoryInterface
{
    public function getAllDetails()
    {
        $detail = Detail::first();
       // if a record was found
       if ($detail) {

        return $detail;

       } else { 
           #if no record was found
           return false;
       }
    }

    public function getDetailById(String $detailId)
    {
        return Order::findOrFail($detailId);
    }

    public function deleteDetail(String $detailId)
    {
        Order::destroy($detailId);
    }

    public function createDetail(array $detailDetails)
    {
        return Order::create($aboutDetails);
    }

    public function updateDetail(String $detailId, array $newDetails)
    {
        return Order::whereId($detailId)->update($newDetails);
    }

    // public function getFulfilledOrders()
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
