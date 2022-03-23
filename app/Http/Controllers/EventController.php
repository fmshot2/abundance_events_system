<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

use App\Interfaces\EventRepositoryInterface;
use Illuminate\Http\JsonResposnse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;


use App\Http\Resources\EventResource;

use App\Http\Resources\ItemResource;



class EventController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->eventRepository->getAllEvents();
        return $response ? res_success('Event Retrieved Successfully', $response) : res_not_found('something went wrong');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
         //Request Validated data
         $validated_data = $request->validated();
         $validated_data['date'] = Carbon::parse($validated_data['date'])->format('Y-m-d');


         $response = $this->eventRepository->createEvent($validated_data);
         return $response ? res_success('Event Posted Successfully', $response) : res_not_found('something went wrong');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $eventId = $request->route('id');
        $event = $this->eventRepository->getEventById($eventId);
        return $event ? res_success('Event Retrieved Successfully', new EventResource($event)) : res_not_found('something went wrong');

    }

    public function showUpcomingEvent()
    {
        return  $this->eventRepository->getUpcomingEvent();
    }

    public function showPreviousEvent()
    {
        return $this->eventRepository->getPreviousEvent();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request)
    {
        $eventId = $request->route('id');

         //Retrieve the validate user input
         $validated_data = $request->validated();

        // $eventDetails = $request->only([
        //     'title',
        //     'details',
        //     'date'
        // ]);

        $response = $this->eventRepository->updateEvent($eventId, $validated_data);
        return $response ? res_success('Updated Event.', $response) : res_not_found('something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function delete(Event $event, Request $request)
    {
        $eventId = $request->route('id');

        $response = $this->eventRepository->deleteEvent($eventId);

        return $response ? res_completed('Event of Id ' . $eventId . ' Deleted successfully') : res_not_found('something went wrong');
    }
}
