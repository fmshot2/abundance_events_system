<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



namespace App\Http\Controllers;

use App\Models\Event;
// use App\Http\Requests\StoreEventRequest;
// use App\Http\Requests\UpdateEventRequest;


use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResposnse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;


use App\Http\Resources\UserResource;

class UserController extends Controller
{

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->userRepository->getAllUsers();
        return $response ? res_success('User Retrieved Successfully', $response) : res_not_found('something went wrong');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
         //Request Validated data
         $validated_data = $request->validated();
         $validated_data['date'] = Carbon::parse($validated_data['date'])->format('Y-m-d');


         $response = $this->userRepository->createUser($validated_data);
         return $response ? res_success('User Posted Successfully', $response) : res_not_found('something went wrong');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $userId = $request->route('id');
        $user = $this->userRepository->getuserById($userId);
        return $user ? res_success('User Retrieved Successfully', new UserResource($user)) : res_not_found('something went wrong');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $userId = $request->route('id');

         //Retrieve the validate user input
         $validated_data = $request->validated();

        // $eventDetails = $request->only([
        //     'title',
        //     'details',
        //     'date'
        // ]);

        $response = $this->userRepository->updateUser($userId, $validated_data);
        return $response ? res_success('Updated User.', $response) : res_not_found('something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\USer  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user, Request $request)
    {
        $userId = $request->route('id');

        $response = $this->userRepository->deleteUser($userId);

        return $response ? res_completed('User of Id ' . $userId . ' Deleted successfully') : res_not_found('something went wrong');
    }
}
