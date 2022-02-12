<?php

namespace App\Repositories;

use App\Interfaces\ServiceRepositoryInterface;
use App\Models\Service;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function getAllServices()
    {
        return Service::orderBy('id', 'ASC')->get();
    }

    public function getServiceById($serviceId)
    {
        return Service::findOrFail($serviceId);
    }

    public function deleteService($serviceId)
    {
        Service::destroy($serviceId);
    }

    public function createService(array $serviceDetails)
    {
        return Service::create($serviceDetails);
    }

    public function updateService($serviceId, array $newDetails)
    {
        $response =  Service::findOrFail($serviceId);
        $response->update($newDetails);
        return $response;
    }

    // public function getFulfilledOrders()
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
