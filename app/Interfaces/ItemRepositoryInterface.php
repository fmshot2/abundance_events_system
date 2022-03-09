<?php

namespace App\Interfaces;

interface ItemRepositoryInterface
{
    public function getAllItems();
    public function getItemById($itemId);
    public function deleteItem($itemId);
    public function createItem(array $itemDetails);
    public function updateItem($itemId, array $newDetails);
    // public function getUpcomingItem();
    // public function getPreviousItem();
    // public function getFulfilledOrders();
}
