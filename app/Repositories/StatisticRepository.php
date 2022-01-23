<?php

namespace App\Repositories;


use App\Interfaces\StatisticRepositoryInterface;

use App\Models\Statistic;

class StatisticRepository implements StatisticRepositoryInterface
{

    public function getAllStatistics()
    {
        return Statistic::first();
    }

    public function getStatisticById($statisticsId)
    {
        return Service::findOrFail($statisticsId);
    }

}
