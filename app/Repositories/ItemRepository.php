<?php

namespace App\Repositories;

use App\Interfaces\ItemRepositoryInterface;
use App\Models\Item;
use Carbon\Carbon;
use App\Http\Resources\ItemResource;


class ItemRepository implements ItemRepositoryInterface
{
    public function getAllItems()
    {
        return ItemResource::collection(Item::orderBy('id', 'ASC')->get());
        // return new EventResource::orderBy('id', 'ASC')->get();
    }

    public function getItemById($itemId)
    {
        return Item::findOrFail($itemId);
    }

    public function deleteItem($itemId)
    {
        // Event::destroy($aboutId);
        $response = Item::findOrFail($itemId);
        $response->delete();
        return $response;
    }

    public function createItem(array $itemDetails)
    {
        return Item::create($itemDetails);
    }

    public function updateItem($itemId, array $newDetails)
    {
        $response =  Item::findOrFail($itemId);

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

// //        ss foreach ($previousEvents as $previousEvent => $value) {
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
