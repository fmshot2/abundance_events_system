<?php

namespace App\Repositories;

use App\Interfaces\ServiceRepositoryInterface;
use App\Models\Service;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function getAllServices()
    {
        $service = Service::orderBy('id', 'ASC')->get();
       // if a record was found
       if ($service) {
        return $service;
       } else {
           #if no record was found
           return false;
       }
    }

    public function getServiceById($serviceId)
    {
        return Service::findOrFail($serviceId);
    }

    public function deleteService($serviceId)
    {
        // Service::destroy($serviceId);
        $response = Service::findOrFail($serviceId);
        $response->delete();
        return $response;
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
