@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<header class="text-center">
    <h1 class="my-5">PROJECTS</h1>
</header>

    <table class="table table-dark table-hover">
        <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Projects</th>
      <th scope="col">Creato</th>
      <th scope="col">Aggiornato il:</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($projects as $project)
        
    
    <tr>
        <th scope="row">{{$project->id}}</th>
        <td>{{$project->title}}</td>
        <td>{{$project->slug}}</td>
        <td>{{$project->link}}</td>
        <td>{{$project->created_at}}</td>
        <td>{{$project->updated_at}}</td>
        <td>
            <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-sm btn-dark"><i class="fa-solid fa-hurricane"></i></a>
        </td>

    </tr>
    @empty
    <tr>
        <td colspan="6">NON CI SONO PROGETTI</td>
    </tr>
    
    @endforelse
  </tbody>
  
    </table>
@endsection