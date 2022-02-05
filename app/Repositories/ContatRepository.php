<?php

namespace App\Repositories;

use App\Interfaces\ContactRepositoryInterface;
use App\Models\Contact;

class ContactRepository implements ContactRepositoryInterface
{
    // public function getAllAbouts()
    // {
    //     return About::first();
    // }

    // public function getAboutById($aboutId)
    // {
    //     return About::findOrFail($aboutId);
    // }

    // public function deleteAbout($aboutId)
    // {
    //     About::destroy($aboutId);
    // }

    public function createContact(array $contactDetails)
    {
        return About::create($contactDetails);
    }

    // public function updateAbout($aboutId, array $newDetails)
    // {
    //     return About::whereId($aboutId)->update($newDetails);
    // }
}
