<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExperienceRequest;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('start_year', 'desc')->get();

        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(StoreExperienceRequest $request)
    {
        $validated = $request->validated();

        Experience::create($validated);

        return redirect()->route('admin.experiences.index')->with('success', 'Experience added successfully.');
    }
}
