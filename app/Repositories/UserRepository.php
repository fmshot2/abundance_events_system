<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\Event;
use Carbon\Carbon;
use App\Http\Resources\UserResource;
use App\Models\User;



class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        return UserResource::collection(User::orderBy('id', 'ASC')->get());
        // return new EventResource::orderBy('id', 'ASC')->get();
    }

    public function getUserById($userId)
    {
        return User::findOrFail($userId);
    }

    public function deleteUser($userId)
    {
        // Event::destroy($aboutId);
        $response = User::findOrFail($userId);
        $response->delete();
        return $response;
    }

    public function createUser(array $userDetails)
    {
        return User::create($userDetails);
    }

    public function updateUser($userId, array $newDetails)
    {
        $response =  User::findOrFail($userId);

        $response->update($newDetails);

        return $response;
    }

}
