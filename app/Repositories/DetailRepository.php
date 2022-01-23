<?php

namespace App\Repositories;

use App\Interfaces\DetailRepositoryInterface;
use App\Models\Detail;

class DetailRepository implements DetailRepositoryInterface
{
    public function getAllDetails()
    {
        return Detail::first();
    }

    public function getDetailById($detailId)
    {
        return Order::findOrFail($detailId);
    }

    public function deleteDetail($detailId)
    {
        Order::destroy($detailId);
    }

    public function createDetail(array $detailDetails)
    {
        return Order::create($aboutDetails);
    }

    public function updateDetail($detailId, array $newDetails)
    {
        return Order::whereId($detailId)->update($newDetails);
    }

    // public function getFulfilledOrders()
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
