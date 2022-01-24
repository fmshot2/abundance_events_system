<?php

namespace App\Interfaces;

interface ContactRepositoryInterface 
{
    // public function getAllAbouts();
    // public function getAboutById($aboutId);
    // public function deleteAbout($aboutId);
    public function createContact(array $contactDetails);
    // public function updateAbout($aboutId, array $newDetails);
    // public function getFulfilledOrders();
}