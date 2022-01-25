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
        return Event::findOrFail($eventId);
    }

    public function deleteEvent($eventId)
    {
        Event::destroy($aboutId);
    }

    public function createEvent(array $eventDetails)
    {
        return Event::create($eventDetails);
    }

    public function updateEvent($eventId, array $newDetails)
    {
        return Event::whereId($eventId)->update($newDetails);
    }

    public function getUpcomingEvent()
    {
        return Event::whereDate('date', '>', Carbon::now());
    }

    public function getPreviousEvent()
    {
        return Event::whereDate('date', '<', Carbon::now());
    }

    // public function getFulfilledOrders()
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
