<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    private ContactRepositoryInterface $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    // public function index()
    // {
    //     return $this->contactRepository->getAllAbouts();
    // }

    public function store(Request $request): JsonResponse
    {
        $aboutDetails = $request->only([
            'title',
            'details'
        ]);

        return $this->contactRepository->createContact($contactDetails);
    }

    // public function show(Request $request): JsonResponse
    // {
    //     $aboutId = $request->route('id');


    //     return response()->json([
    //         'data' => $this->aboutRepository->getAboutById($aboutId)
    //     ]);
    // }

    // public function update(Request $request): JsonResponse
    // {
    //    $aboutId = $request->route('id');

    //     $aboutDetails = $request->only([
    //         'title',
    //         'details'
    //     ]);

    //     return response()->json([
    //         'data' => $this->aboutRepository->updateAbout($aboutId, $aboutDetails)
    //     ]);
    // }

    // public function destroy(Request $request): JsonResponse
    // {
    //     $aboutId = $request->route('id');
    //     $this->aboutRepository->deleteAbout($aboutId);

    //     return response()->json(null, Response::HTTP_NO_CONTENT);
    // }
}
