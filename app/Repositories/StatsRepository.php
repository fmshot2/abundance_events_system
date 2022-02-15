<?php

namespace App\Repositories;

use App\Interfaces\StatsRepositoryInterface;
use App\Models\Statistic;

class StatsRepository implements StatsRepositoryInterface
{
    public function getAllStats()
    {
        return Statistic::orderBy('id', 'ASC')->get();
    }

    public function getStatById($statId)
    {
        return Statistic::findOrFail($statId);
    }

    public function updateStatistic($statisticId, array $newDetails)
    {
        $response =  Statistic::findOrFail($statisticId);
        $response->update($newDetails);
        return $response;
    }

    public function createStatistic(array $StatisticDetails)
    {
        return Statistic::create($StatisticDetails);
    }


    public function deleteStatistic(String $statisticId) {
        $response = Statistic::findOrFail($statisticId);
        $response->delete();
        return $response;
    }
}
