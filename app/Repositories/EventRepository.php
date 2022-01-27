<?php

namespace App\Repositories;

use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;
use Carbon\Carbon;


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
        return Event::whereDate('date', '>', Carbon::now())->get();
    }

    public function getPreviousEvent()
    {
        $previousEvents = Event::whereDate('date', '<', Carbon::now())->get();
        foreach ($previousEvents as $previousEvent => $value) {
            $previousEvent['date'] = Carbon::createFromFormat('d/m/Y', $dateString);

//             $dateString = '25/08/2017';
// $dateObject = \Carbon::createFromFormat('d/m/Y', $dateString);

        }
        return $previousEvents;
    }

    // public function getFulfilledOrders()
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
