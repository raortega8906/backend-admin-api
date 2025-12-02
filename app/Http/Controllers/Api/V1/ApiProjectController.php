<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiProjectController extends Controller
{
    public function index(): JsonResponse
    {
        $data = Project::orderByDesc('created_at')->get();

        if ($data->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'No hay proyectos registrados',
                'data' => $data
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Proyectos listados correctamente',
            'data' => $data
        ], 200);
    }

    public function show(Project $project): JsonResponse
    {
        if (!$project) {
            return response()->json([
                'status' => 404,
                'message' => 'No se pudo encontrar el proyecto',
                'data' => []
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Proyecto encontrado',
            'data' => $project
        ], 200);
    }
}
