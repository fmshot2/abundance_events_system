<?php

namespace App\Interfaces;

interface DetailRepositoryInterface 
{
    public function getAllDetails();
    public function getDetailById(String $detailId);
    public function deleteDetail(String $detailId);
    public function createDetail(array $detailDetails);
    public function updateDetail(String $detailId, array $newDetails);
    // public function getFulfilledOrders();
}