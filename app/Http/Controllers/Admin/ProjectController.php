<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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
        try {
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
                try {
                    $file = $request->file('image');
                    
                    // Validate file before storing
                    if (!$file->isValid()) {
                        return back()->withErrors(['image' => __('messages.image_upload_failed') ?? 'الملف المرفوع غير صالح.'])->withInput();
                    }
                    
                    // Ensure the directory exists
                    if (!Storage::disk('public')->exists('projects')) {
                        Storage::disk('public')->makeDirectory('projects', 0755, true);
                    }
                    
                    // Store the image and get the path
                    $imagePath = $file->store('projects', 'public');
                    
                    if (!$imagePath) {
                        Log::error('Image upload: store() returned false/null');
                        return back()->withErrors(['image' => __('messages.image_upload_failed') ?? 'فشل حفظ الصورة. يرجى المحاولة مرة أخرى.'])->withInput();
                    }
                    
                    // Verify the file was stored successfully
                    if (!Storage::disk('public')->exists($imagePath)) {
                        Log::error('Image upload: File stored but not found at path: ' . $imagePath);
                        return back()->withErrors(['image' => __('messages.image_upload_failed') ?? 'فشل التحقق من حفظ الصورة. يرجى المحاولة مرة أخرى.'])->withInput();
                    }
                    
                    // Store the path in validated array (path should be like: projects/filename.jpg)
                    $validated['image'] = $imagePath;
                    
                    Log::info('Image uploaded successfully: ' . $imagePath . ' | Full path: ' . Storage::disk('public')->path($imagePath));
                } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
                    Log::error('Image upload error: File too large - ' . $e->getMessage());
                    return back()->withErrors(['image' => __('messages.file_too_large') ?? 'حجم الملف كبير جداً. الحد الأقصى 2 ميجابايت'])->withInput();
                } catch (\Exception $e) {
                    Log::error('Image upload error: ' . $e->getMessage() . ' | Trace: ' . $e->getTraceAsString());
                    return back()->withErrors(['image' => __('messages.image_upload_error') ?? 'حدث خطأ أثناء رفع الصورة: ' . $e->getMessage()])->withInput();
                }
            }

            // Set default values for old fields (for backward compatibility)
            $validated['name'] = $validated['name_en'] ?? '';
            $validated['description'] = $validated['description_en'] ?? '';
            $validated['type'] = $validated['type_en'] ?? null;

            $project = Project::create($validated);
            
            Log::info('Project created successfully. ID: ' . $project->id . ' | Image path: ' . ($project->image ?? 'null'));

            return redirect()->route('admin.projects.index')
                ->with('success', __('messages.project_created_successfully') ?? 'تم إنشاء المشروع بنجاح.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            Log::error('Project creation error: ' . $e->getMessage());
            return back()->withErrors(['error' => __('messages.project_creation_error') ?? 'حدث خطأ أثناء إنشاء المشروع. يرجى المحاولة مرة أخرى.'])->withInput();
        }
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
        try {
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
                try {
                    $file = $request->file('image');
                    
                    // Validate file before storing
                    if (!$file->isValid()) {
                        return back()->withErrors(['image' => __('messages.image_upload_failed') ?? 'الملف المرفوع غير صالح.'])->withInput();
                    }
                    
                    // Ensure the directory exists
                    if (!Storage::disk('public')->exists('projects')) {
                        Storage::disk('public')->makeDirectory('projects', 0755, true);
                    }
                    
                    // Delete old image
                    if ($project->image && Storage::disk('public')->exists($project->image)) {
                        Storage::disk('public')->delete($project->image);
                    }
                    
                    // Store the new image
                    $imagePath = $file->store('projects', 'public');
                    
                    if (!$imagePath) {
                        Log::error('Image upload: store() returned false/null');
                        return back()->withErrors(['image' => __('messages.image_upload_failed') ?? 'فشل حفظ الصورة. يرجى المحاولة مرة أخرى.'])->withInput();
                    }
                    
                    // Verify the file was stored successfully
                    if (!Storage::disk('public')->exists($imagePath)) {
                        Log::error('Image upload: File stored but not found at path: ' . $imagePath);
                        return back()->withErrors(['image' => __('messages.image_upload_failed') ?? 'فشل التحقق من حفظ الصورة. يرجى المحاولة مرة أخرى.'])->withInput();
                    }
                    
                    // Store the path in validated array (path should be like: projects/filename.jpg)
                    $validated['image'] = $imagePath;
                    
                    Log::info('Image updated successfully: ' . $imagePath . ' | Full path: ' . Storage::disk('public')->path($imagePath));
                } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
                    Log::error('Image upload error: File too large - ' . $e->getMessage());
                    return back()->withErrors(['image' => __('messages.file_too_large') ?? 'حجم الملف كبير جداً. الحد الأقصى 2 ميجابايت'])->withInput();
                } catch (\Exception $e) {
                    Log::error('Image upload error: ' . $e->getMessage() . ' | Trace: ' . $e->getTraceAsString());
                    return back()->withErrors(['image' => __('messages.image_upload_error') ?? 'حدث خطأ أثناء رفع الصورة: ' . $e->getMessage()])->withInput();
                }
            }

            // Set default values for old fields (for backward compatibility)
            $validated['name'] = $validated['name_en'] ?? '';
            $validated['description'] = $validated['description_en'] ?? '';
            $validated['type'] = $validated['type_en'] ?? null;

            $project->update($validated);

            return redirect()->route('admin.projects.index')
                ->with('success', __('messages.project_updated_successfully') ?? 'تم تحديث المشروع بنجاح.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            Log::error('Project update error: ' . $e->getMessage());
            return back()->withErrors(['error' => __('messages.project_update_error') ?? 'حدث خطأ أثناء تحديث المشروع. يرجى المحاولة مرة أخرى.'])->withInput();
        }
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
