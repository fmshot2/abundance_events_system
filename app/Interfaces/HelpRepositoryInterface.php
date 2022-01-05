<?php

namespace App\Interfaces;

interface HelpRepositoryInterface 
{
    public function getAllHelps();
    public function getHelpById($helpId);
    public function deleteHelp($helpId);
    public function createHelp(array $helpDetails);
    public function updateHelp($helpId, array $newDetails);
    // public function getFulfilledOrders();
}