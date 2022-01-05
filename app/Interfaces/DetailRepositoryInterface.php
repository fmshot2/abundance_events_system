<?php

namespace App\Interfaces;

interface DetailRepositoryInterface 
{
    public function getAllDetails();
    public function getDetailById($detailId);
    public function deleteDetail($detailId);
    public function createDetail(array $detailDetails);
    public function updateDetail($detailId, array $newDetails);
    // public function getFulfilledOrders();
}