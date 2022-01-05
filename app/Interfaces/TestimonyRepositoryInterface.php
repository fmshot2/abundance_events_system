<?php

namespace App\Interfaces;

interface TestimonyRepositoryInterface 
{
    public function getAllTestimonies();
    public function getTestimonyById($testimonyId);
    public function deleteTestimony($testimonyId);
    public function createTestimony(array $testimonyDetails);
    public function updateTestimony($testimonyId, array $newDetails);
    // public function getFulfilledOrders();
}