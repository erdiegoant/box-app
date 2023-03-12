<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    public function detail(Request $request, string $document): JsonResponse
    {
        $customer = Customer::where('document', $document)->with([
            'boxes',
            'boxes.origin',
            'boxes.destination',
        ])->firstOrFail();

        return response()->json([
            'data' => $customer,
        ], Response::HTTP_OK);
    }
}
