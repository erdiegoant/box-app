<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Box;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;

class BoxesController extends Controller
{
    public function index(): JsonResponse
    {
        $boxes = Box::with([
            'origin',
            'destination',
            'customer:id,name',
            'items',
        ])->get();

        return response()->json([
            'data' => $boxes,
        ], Response::HTTP_OK);
    }

    public function details(Request $request, string $uuid): JsonResponse
    {
        $boxes = Box::where('uuid', $uuid)->with([
            'origin',
            'destination',
            'customer:id,name',
            'items',
        ])->firstOrFail();

        return response()->json([
            'data' => $boxes,
        ], Response::HTTP_OK);
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json();
    }
}
