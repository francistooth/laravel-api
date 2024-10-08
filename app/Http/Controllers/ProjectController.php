<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Functions\Helper;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('admin.projects.index', ["projects" => $projects]);
    }

    public function create(){
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required',
            'text' => 'required',
            'path_image' => 'nullable|image|max:2048',
        ]);


        if ($request->hasFile('path_image')) {
            $image_name = $request->file('path_image')->getClientOriginalName();
            $validated_data['image_original_name'] = $image_name;
            $validated_data['path_image'] = $request->file('path_image')->storeAs('projects', $image_name);
        }

        $slug = Helper::generateSlug($validated_data['title'], Project::class);
        $validated_data['slug'] = $slug;

        $proj = Project::create($validated_data);
        return redirect()->route('projects.index');

    }


    public function edit(Request $request, Project $project)
    {
        return view('admin.projects.edit', ['project' => $project]);
    }

    public function update(Request $request, Project $project)
    {
        $validated_data = $request->validate([
            'title' => 'required',
            'text' => 'required',
            'path_image' => 'nullable|image|max:2048',
        ]);

        $project->update($validated_data);
        return redirect()->route('projects.show', $project);
    }

    public function show(Request $request, Project $project)
    {
        return view('admin.projects.show', ['project' => $project]);
    }

    public function delete(Request $request, Project $project)
    {
        // Storage::delete(['file', 'otherFile']);
        $project->delete();
        return redirect()->route('projects.index');
    }
}
