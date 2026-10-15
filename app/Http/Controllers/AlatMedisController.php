<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\JsonResponse;

class AlatMedisController extends Controller
{
    /**
     * Display a listing of medical devices.
     */
    public function index(): JsonResponse
    {
        $alats = Alat::all();

        return response()->json([
            'data' => $alats,
        ]);
    }
}
