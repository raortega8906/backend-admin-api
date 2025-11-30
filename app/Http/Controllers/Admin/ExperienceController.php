<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExperienceRequest;
use App\Http\Requests\Admin\UpdateExperienceRequest;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('start_year', 'desc')->paginate(3);

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

        return redirect()->route('admin.experiences.index')->with('success', 'Experiencia añadida correctamente.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Experience $experience, UpdateExperienceRequest $request)
    {
        $validated = $request->validated();
        $experience->update($validated);

        return redirect()->route('admin.experiences.index')->with('success', 'Experiencia actualizada correctamente.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('admin.experiences.index')->with('success', 'Experiencia eliminada correctamente.');
    }
}
