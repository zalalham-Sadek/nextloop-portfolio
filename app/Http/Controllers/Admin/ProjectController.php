<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('order')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'link' => 'nullable|url',
            'type_en' => 'nullable|string|max:255',
            'type_ar' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            // Store the image and get the path
            $imagePath = $request->file('image')->store('projects', 'public');
            $validated['image'] = $imagePath;
            
            // Ensure the file was stored successfully
            if (!Storage::disk('public')->exists($imagePath)) {
                return back()->withErrors(['image' => 'Failed to upload image.'])->withInput();
            }
        }

        // Set default values for old fields (for backward compatibility)
        $validated['name'] = $validated['name_en'] ?? '';
        $validated['description'] = $validated['description_en'] ?? '';
        $validated['type'] = $validated['type_en'] ?? null;

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', __('messages.project_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'link' => 'nullable|url',
            'type_en' => 'nullable|string|max:255',
            'type_ar' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        // Set default values for old fields (for backward compatibility)
        $validated['name'] = $validated['name_en'] ?? '';
        $validated['description'] = $validated['description_en'] ?? '';
        $validated['type'] = $validated['type_en'] ?? null;

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', __('messages.project_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete image if exists
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
