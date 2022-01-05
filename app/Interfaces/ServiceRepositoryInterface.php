<?php

namespace App\Interfaces;

interface ServiceRepositoryInterface 
{
    public function getAllServices();
    public function getServiceById($serviceId);
    public function deleteService($serviceId);
    public function createService(array $serviceDetails);
    public function updateService($serviceId, array $newDetails);
    // public function getFulfilledOrders();
}