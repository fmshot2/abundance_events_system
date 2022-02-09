<?php

namespace App\Repositories;

use App\Interfaces\StatsRepositoryInterface;
use App\Models\Statistic;

class StatsRepository implements StatsRepositoryInterface
{
    public function getAllStats()
    {
        return Statistic::all();
    }

    public function getStatById($statId)
    {
        return Statistic::findOrFail($statId);
    }

    public function updateStatistic($statisticId, array $newDetails)
    {
        $response =  Service::findOrFail($statisticId);
        $response->update($newDetails);
        return $response;
    }
}
