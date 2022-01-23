<?php

namespace App\Interfaces;

interface StatsRepositoryInterface
{
    public function getAllStats();
    public function getStatById($statId);
}
