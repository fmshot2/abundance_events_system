<?php

namespace App\Interfaces;

interface StatisticRepositoryInterface
{
    public function getAllStatistics();
    public function getStatisticById($statisticId);
    // public function deleteStatistic($statisticId);
    // public function createStatistic(array $statisticDetails);
    // public function updateStatistic($statisticId, array $newDetails);
    // public function getFulfilledOrders();
}
