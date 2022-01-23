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

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->aboutRepository->getAllAbouts()
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $aboutDetails = $request->only([
            'title',
            'details'
        ]);

        return response()->json(
            [
                'data' => $this->aboutRepository->createAbout($aboutDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $aboutId = $request->route('id');


        return response()->json([
            'data' => $this->aboutRepository->getAboutById($aboutId)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
       $aboutId = $request->route('id');

        $aboutDetails = $request->only([
            'title',
            'details'
        ]);

        return response()->json([
            'data' => $this->aboutRepository->updateAbout($aboutId, $aboutDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $aboutId = $request->route('id');
        $this->aboutRepository->deleteAbout($aboutId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
