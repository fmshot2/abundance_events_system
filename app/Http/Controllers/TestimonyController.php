<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use App\Http\Requests\StoreTestimonyRequest;
use App\Http\Requests\UpdateTestimonyRequest;

use App\Interfaces\TestimonyRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestimonyController extends Controller
{

    private TestimonyRepositoryInterface $testimonyRepository;

    public function __construct(TestimonyRepositoryInterface $testimonyRepository)
    {
        $this->testimonyRepository = $testimonyRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(): JsonResponse
    // {
    //     return $this->testimonyRepository->getAllTestimonies();
    // }

    public function index()
    {
        $testimonies = $this->testimonyRepository->getAllTestimonies();
        return $testimonies ? res_success('All testimonies.', $testimonies) : res_not_found('something went wrong');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestimonyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $testimonyId = $request->route('id');
        return $this->testimonyRepository->getTestimonyById($testimonyId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimony $testimony)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestimonyRequest  $request
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimony $testimony)
    {
        $testimonyId = $request->route('id');

        $testimonyDetails = $request->only([
            'name',
            'details',
            'profession',
            'rating'
    ]);
        $response = $this->testimonyRepository->updateTestimony($testimonyId, $testimonyDetails);
        return $response ? res_success('Updated $testimony', $response) : res_not_found('something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimony $testimony)
    {
        //
    }
}
