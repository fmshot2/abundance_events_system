<?php

namespace App\Repositories;

use App\Interfaces\StatisticRepositoryInterface;
use App\Models\Statistic;

class StatisticRepository implements StatisticRepositoryInterface
{
        public function getAllStatistics()
    {
        return Statistic::all();
    }
}

class AboutRepository implements AboutRepositoryInterface
{
    public function getAllAbouts()
    {
        return About::first();
    }
}
