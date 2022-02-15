<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Http\Requests\StoreDetailRequest;
use App\Http\Requests\UpdateDetailRequest;

use App\Interfaces\DetailRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class DetailController extends Controller
{

    private DetailRepositoryInterface $detailRepository;

    public function __construct(DetailRepositoryInterface $detailRepository)
    {
        $this->detailRepository = $detailRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return $this->detailRepository->getAllDetails();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailRequest $request)
    {
        if(!$this->detailRepository->getAllDetails()) {

        //Request Validated data
        $validated_data = $request->validated();

        $response = $this->detailRepository->createDetail($validated_data);

        return $response ? res_success('System Config Posted Successfully', $response) : res_not_found('something went wrong');
        }
        return res_not_found('You Already Have System Config In DB! Update That One Instead!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailRequest  $request
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailRequest $request)
    {
        $detailId = $request->route('id');

        //Retrieve the validate user input
        $validated_data = $request->validated();

       $response = $this->detailRepository->updateDetail($detailId, $validated_data);
       return $response ? res_success('Updated System config Successfully.', $response) : res_not_found('something went wrong');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        //
    }
}
