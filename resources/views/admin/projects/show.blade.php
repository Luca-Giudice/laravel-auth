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
    </div>
</div>
<div>

    <p>{{$project->content}}</p>
</div>
@endsection