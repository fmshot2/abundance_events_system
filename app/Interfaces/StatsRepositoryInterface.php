<?php

namespace App\Interfaces;

interface StatsRepositoryInterface
{
    public function getAllStats();
    public function getStatById($statId);
    // public function createStatistic(array $StatisticDetails);
    public function updateStatistic($StatisticId, array $newDetails);
    public function deleteStatistic(String $statisticId);
}
