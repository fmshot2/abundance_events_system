<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Interfaces\ItemRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\ItemResource;

use Carbon\Carbon;



class ItemController extends Controller
{
    private $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->itemRepository->getAllItems();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        //Request Validated data
        $validated_data = $request->validated();
        $validated_data['date'] = Carbon::parse($validated_data['date'])->format('Y-m-d');


        $response = $this->itemRepository->createItem($validated_data);
        return $response ? res_success('Item Posted Successfully', $response) :
         res_not_found('something went wrong');
    }

    public function get_items_for_event(Request $request){

        $eventId = $request->route('event_id');

        $event = $this->itemRepository->getItemsForEvent($eventId);

        return $event ? res_success('Event Items Retrieved Successfully', ItemResource::collection($event)) : res_not_found('something went wrong');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $itemId = $request->route('id');

        $item = $this->itemRepository->getItemById($itemId);
        return $item ? res_success('Item Retrieved Successfully', new ItemResource($item)) : res_not_found('something went wrong');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request)
    {
        $itemId = $request->route('id');

         //Retrieve the validate user input
         $validated_data = $request->validated();

        $response = $this->itemRepository->updateItem($itemId, $validated_data);
        return $response ? res_success('Updated Item.', $response) : res_not_found('something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
