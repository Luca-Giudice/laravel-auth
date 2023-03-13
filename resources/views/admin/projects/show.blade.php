@extends('layouts.app')

@section('title', $project->title)

@section('content')
<header class="text-center">
    <h1 class="my-5">{{$project->title}}</h1>
</header>
<div class="d-flex align-items-center">
    @if($project->image)
    <img class="my-3 p-5" src="{{$project->image}}" alt="">
    @endif
    <div class="">
        <p>
            <strong>Creato il:</strong>
            <time>{{$project->created_at}}</time>

        </p>
        <p>
            <strong>Ultima modifica:</strong>
            <time>{{$project->updated_at}}</time>

        </p>
        <p>
            <strong>link:</strong>
            {{$project->link}}

        </p>
    </div>
</div>
<div>

    <p>{{$project->content}}</p>
</div>
<hr>
<div class="d-flex justify-content-center">
    <form method="POST" action="{{route('admin.projects.destroy', $project->id)}}" class="delete-form">
              @csrf
              @method('DELETE')
              <button class="me-2 btn btn-outline-danger" type="submit"><i class=" p-1 fa-solid fa-trash"></i>ELIMINA</button>
            </form>
    <a class="btn btn btn-outline-success" href="{{route('admin.projects.index')}}"><i class="fa-solid fa-arrow-left-long me-2"></i>TORNA INDIETRO</a>
    
</div>  
@endsection

@section('scripts')
    
@endsection