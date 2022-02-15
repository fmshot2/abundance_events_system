<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;


use App\Interfaces\AboutRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AboutController extends Controller
{
    private AboutRepositoryInterface $aboutRepository;

    public function __construct(AboutRepositoryInterface $aboutRepository)
    {
        $this->aboutRepository = $aboutRepository;
    }

    public function index()
    {
        return $this->aboutRepository->getAllAbouts();
    }

    public function store(StoreAboutRequest $request)
    {
        if(!$this->aboutRepository->getAllAbouts()) 
        {

        //Request Validated data
        $validated_data = $request->validated();

        $response = $this->aboutRepository->createAbout($validated_data);

        return $response ? res_success('About Posted Successfully', $response) : res_not_found('something went wrong');
        }
        return res_not_found('You Already Have About In DB! Update That One Instead!');
    }

    public function show(Request $request)
    {
        $aboutId = $request->route('id');

        return $this->aboutRepository->getAboutById($aboutId);
    }

    public function update(UpdateAboutRequest $request)
    {
       $aboutId = $request->route('id');

       $validated_data = $request->validated();

        $response = $this->eventRepository->updateEvent($eventId, $validated_data);

        $response = $this->aboutRepository->updateAbout($aboutId, $validated_data);
        return $response ? res_success('Updated About Successfully.', $response) : res_not_found('something went wrong');

    }

    public function delete(Request $request)
    {
        $aboutId = $request->route('id');
        $response = $this->aboutRepository->deleteAbout($aboutId);
        return $response ? res_completed('About of Id ' . $aboutId . ' Deleted successfully') : res_not_found('something went wrong');

        // return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
