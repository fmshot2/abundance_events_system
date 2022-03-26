<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use App\Http\Requests\StoreSpeakerRequest;
use App\Http\Requests\UpdateSpeakerRequest;


use App\Interfaces\SpeakerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\SpeakerResource;

use Carbon\Carbon;

class SpeakerController extends Controller
{
    private $speakerRepository;

    public function __construct(SpeakerRepositoryInterface $speakerRepository)
    {
        $this->speakerRepository = $speakerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->speakerRepository->getAllSpeakers();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSPeakerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpeakerRequest $request)
    {
        //Request Validated data
        $validated_data = $request->validated();
        $validated_data['date'] = Carbon::parse($validated_data['date'])->format('Y-m-d');


        $response = $this->speakerRepository->createSpeaker($validated_data);
        return $response ? res_success('Speaker Posted Successfully', $response) :
         res_not_found('something went wrong');
    }

    public function get_speakers_for_event(Request $request){

        $eventId = $request->route('event_id');

        $event = $this->speakerRepository->getSpeakersForEvent($speakerId);

        return $speaker ? res_success('Event Speakers Retrieved Successfully', SpeakerResource::collection($speaker)) : res_not_found('something went wrong');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $speakerId = $request->route('id');

        $speaker = $this->speakerRepository->getSpeakerById($speakerId);
        return $speaker ? res_success('Speaker Retrieved Successfully', new SpeakerResource($speaker)) : res_not_found('something went wrong');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpeakerRequest  $request
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpeakerRequest $request)
    {
        $speakerId = $request->route('id');

         //Retrieve the validate user input
         $validated_data = $request->validated();

        $response = $this->speakerRepository->updateSpeaker($speakerId, $validated_data);
        return $response ? res_success('Updated Speaker.', $response) : res_not_found('something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speaker $speaker)
    {
        //
    }
}
