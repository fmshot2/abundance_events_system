<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use App\Http\Requests\StoreSpeakerRequest;
use App\Http\Requests\UpdateSpeakerRequest;


use App\Interfaces\SpeakerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\SpeakerResource;
use App\Models\Item;

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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSPeakerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpeakerRequest $request)
    {
       //Request Validated data
        $validated_data = $request->validated();
        // $item = Item::findorFail($request->route('item_id'));
        // if (!$item) {
        //     res_not_found("This Topic doesn't exist");
        // }
        // $validated_data['item_id'] =
        // intval($request->route('item_id'));
        // // return response()->json($validated_data, 200);

        $response = $this->speakerRepository->createSpeaker($validated_data);
        return $response ? res_success('Item Posted Successfully', $response) :
         res_not_found('something went wrong');
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

    public function get_speakers_for_event(Request $request){

        $eventId = $request->route('event_id');

        $event = $this->speakerRepository->getSpeakersForEvent($speakerId);

        return $speaker ? res_success('Event Speakers Retrieved Successfully', SpeakerResource::collection($speaker)) : res_not_found('something went wrong');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

        $speakerId = $request->route('id');

        $response = $this->speakerRepository->deleteSpeaker($speakerId);

        return $response ? res_completed('Speaker of Id ' . $speakerId . ' Deleted successfully') : res_not_found('something went wrong');
    }
}
