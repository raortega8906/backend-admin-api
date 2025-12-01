<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiExperienceController extends Controller
{
    public function index (): JsonResponse
    {
        $data = Experience::orderBy('start_year', 'desc')->get();

        if ($data->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'No hay experiencia laboral registrada',
                'data' => $data
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Listado de la experiencia laboral',
            'data' => $data
        ], 200);
    }

    public function show(Experience $experience): JsonResponse
    {
        if (!$experience) {
            return response()->json([
                'status' => 404,
                'message' => 'No se pudo encontrar la experiencia laboral',
                'data' => []
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Experiencia laboral encontrada',
            'data' => $experience
        ], 200);
    }
}
