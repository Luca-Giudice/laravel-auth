@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<header class="text-center d-flex justify-content-between align-items-center">
    <h1 class="my-5">PROJECTS</h1>
    <a href="{{route('admin.projects.create')}}" class="btn btn-black"><i class="fas fa-plus me-2"></i> Importa un Nuovo Progetto</a>
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
        <td class="d-flex justify-content-end align-items-center">
            <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-sm btn-dark"><i class="fa-solid fa-hurricane"></i></a>
            <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-sm btn-dark m-2"><i class="fa-solid fa-pencil"></i></a>
            <form method="POST" action="{{route('admin.projects.destroy', $project->id)}}" class="delete-form">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-dark" type="submi"><i class="fa-solid fa-trash"></i></button>
            </form>
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

@section('scripts')
    <script>
      const deleteForms = document.querySelectorAll('.delete-form')
      deleteForms.forEach(form=>{
        form.addEventListener('submit', e => {
          e.preventDefault();
          const hasConfirmed = confirm('Sei sicuro di voler cancellare questo progetto?');
          if(hasConfirmed) form.submit();
        });
      })
    </script>
@endsection