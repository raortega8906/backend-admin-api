<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $experiencesCount = Experience::count();
        $projectsCount = Project::count();
        
        $recentActivity = [
            [
                'message' => 'Última experiencia añadida',
                'time' => Experience::latest()->first()?->created_at?->diffForHumans() ?? 'N/A'
            ],
            [
                'message' => 'Último proyecto añadido',
                'time' => Project::latest()->first()?->created_at?->diffForHumans() ?? 'N/A'
            ],
        ];

        return view('dashboard', compact('experiencesCount', 'projectsCount', 'recentActivity'));
    }
}
