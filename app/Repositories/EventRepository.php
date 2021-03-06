<?php

namespace App\Repositories;

use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;
use Carbon\Carbon;
use App\Http\Resources\EventResource;
use App\Models\Item;



class EventRepository implements EventRepositoryInterface
{
    public function getAllEvents()
    {
        return EventResource::collection(Event::orderBy('id', 'ASC')->get());
        // return new EventResource::orderBy('id', 'ASC')->get();
    }

    public function getEventById($eventId)
    {
        return Event::findOrFail($eventId);
    }

    public function deleteEvent($eventId)
    {
        // Event::destroy($aboutId);
        $response = Event::findOrFail($eventId);
        $response->delete();
        return $response;
    }

    public function createEvent(array $eventDetails)
    {
        return Event::create($eventDetails);
    }

    public function updateEvent($eventId, array $newDetails)
    {
        $response =  Event::findOrFail($eventId);

        $response->update($newDetails);

        return $response;
    }

    public function getUpcomingEvent()
    {
        return Event::whereDate('date', '>', Carbon::now())->get();
    }

    public function getPreviousEvent()
    {
        $previousEvents = Event::whereDate('date', '<', Carbon::now())->get();

//         foreach ($previousEvents as $previousEvent => $value) {
//             $date = Carbon::parse($previousEvent['date']);
//             $previousEvent['date'] = Carbon::createFromFormat('d/m/Y', $date);

// //             $dateString = '25/08/2017';
// // $dateObject = \Carbon::createFromFormat('d/m/Y', $dateString);

//         }
        return $previousEvents;
    }
}
