<?php

namespace App\Repositories;

use App\Interfaces\SpeakerRepositoryInterface;
use App\Models\Speaker;
use Carbon\Carbon;
use App\Http\Resources\SpeakerResource;

use App\Models\Item;


class SpeakerRepository implements SpeakerRepositoryInterface
{
    public function getAllSpeakers()
    {
        return SpeakerResource::collection(Item::orderBy('id', 'ASC')->get());
        // return new EventResource::orderBy('id', 'ASC')->get();
    }

    public function getSpeakerById($speakerId)
    {
        return Speaker::findOrFail($speakerId);
    }

    public function deleteSpeaker($speakerId)
    {
        // Event::destroy($aboutId);
        $response = Speaker::findOrFail($speakerId);
        $response->delete();
        return $response;
    }

    public function createSpeaker(array $eventDetails)
    {
        return Speaker::create($speakerDetails);
    }

    public function updateSpeaker($speakerId, array $newDetails)
    {
        $response =  Speaker::findOrFail($speakerId);

        $response->update($newDetails);

        return $response;
    }

//     public function getUpcomingEvent()
//     {
//         return Item::whereDate('date', '>', Carbon::now())->get();
//     }

//     public function getPreviousEvent()
//     {
//         $previousEvents = Item::whereDate('date', '<', Carbon::now())->get();

// //         foreach ($previousEvents as $previousEvent => $value) {
// //             $date = Carbon::parse($previousEvent['date']);
// //             $previousEvent['date'] = Carbon::createFromFormat('d/m/Y', $date);

// // //             $dateString = '25/08/2017';
// // // $dateObject = \Carbon::createFromFormat('d/m/Y', $dateString);

// //         }
//         return $previousEvents;
//     }

    // public function getFulfilledOrders()
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
