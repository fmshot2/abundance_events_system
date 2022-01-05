<?php

namespace App\Repositories;

use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;

class EventRepository implements EventRepositoryInterface 
{
    public function getAllEvents() 
    {
        return Event::all();
    }

    public function getEventById($eventId) 
    {
        return Order::findOrFail($eventId);
    }

    public function deleteEvent($eventId) 
    {
        Order::destroy($aboutId);
    }

    public function createEvent(array $eventDetails) 
    {
        return Order::create($eventDetails);
    }

    public function updateEvent($eventId, array $newDetails) 
    {
        return Order::whereId($eventId)->update($newDetails);
    }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
