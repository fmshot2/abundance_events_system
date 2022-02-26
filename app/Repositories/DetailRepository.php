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
        return Detail::findOrFail($detailId);
    }

    public function deleteDetail(String $detailId)
    {
        Detail::destroy($detailId);
    }

    public function createDetail(array $detailDetails)
    {
        return Detail::create($detailDetails);
    }

    public function updateDetail(String $detailId, array $newDetails)
    {

        $response =  Detail::findOrFail($detailId);

        $response->update($newDetails);
        
        return $response;
    }

    // public function getFulfilledOrders()
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
