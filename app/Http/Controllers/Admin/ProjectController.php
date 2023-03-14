<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $projects = Project::orderBy('updated_at', 'DESC')->get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:projects|min:5|max:20',
            'content'=> 'required|string|min:3',
            'image' => 'nullable|url',
            'link' => 'url',
        ],[
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere almeno 5 caratteri',
            'title.max' => 'Il titolo deve avere massimo 20 caratteri',
            'title.unique' => 'Questo progetto esiste già',
            'content.required' => 'Il post deve avere un contenuto',
            'image.url' => 'Il link deve essere valido',
            'link.url' => 'il link deve essere valido',

        ]);
        $data = $request->all();
        $project = new Project();
        $data['slug'] = Str::slug($data['title'], '/');
        $project->fill($data);
        $project->save();
        return to_route('admin.projects.show', $project->id)->with('type','success')->with('Progetto caricato con successo');
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
        $request->validate([
            'title' => ['required', 'string', Rule::unique('projects')->ignore($project->id),'min:5','max:20'],
            'content' => 'required|string|min:3',
            'image' => 'nullable|url',
            'link' => 'url',
        ], [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere almeno 5 caratteri',
            'title.max' => 'Il titolo deve avere massimo 20 caratteri',
            'title.unique' => 'Questo progetto esiste già',
            'content.required' => 'Il post deve avere un contenuto',
            'image.url' => 'Il link deve essere valido',
            'link.url' => 'il link deve essere valido',

        ]);
        $data = $request->all();

        $data['slug']= Str::slug($data['title'], '/');
        $project->update($data);
        return to_route('admin.projects.show', $project->id)->with('type', 'success')->with('msg','Progetto modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index')->with('type', 'danger')->with('msg', "Il progetto '$project->title' è stato rimosso");
    }
}
