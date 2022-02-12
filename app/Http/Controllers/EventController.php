<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

use App\Interfaces\EventRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return $this->eventRepository->getAllEvents();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // //details');
        // $table->string('title');
        // $table->dateTime('date
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        //
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
        return $this->eventRepository->getEventById($eventId);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $eventId = $request->route('id');

        $eventDetails = $request->only([
            'title',
            'details',
            'date'
        ]);
        $response = $this->eventRepository->updateEvent($eventId, $eventDetails);
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
