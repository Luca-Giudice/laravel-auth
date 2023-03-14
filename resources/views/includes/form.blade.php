@if ($project->exists)
    
<form action="{{route('admin.projects.update', $project->id)}}" method="POST" enctype="multipart/form-data">
</form> 
  @method('PUT')
  @else
<form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">    
@endif

@csrf
<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
  <label for="title" class="form-label">Titolo Progetto</label>
  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$project->title}}" required minlength="5" maxlength="20">
  @error('title')
  <div class="is-invalid">{{$message}}</div>
  @else
  <div class=" text-muted">Inserisci il titolo</div>
  @enderror
</div>

</div>
 <div class="col-md-4">
        <div class="mb-3">
  <label for="image" class="form-label">Immagine</label>
  <input type="file" class="form-control" id="image" name="image">
  
  </div>
 </div>
 <div class="col-md-4">
        <div class="mb-3">
  <label for="link" class="form-label">Link Progetto</label>
  <input type="url" class="form-control  @error('link') is-invalid @enderror" id="link" name="link">
   @error('link')
  <div class="is-invalid">{{$message}}</div>
  @else
  <div class=" text-muted">Inserisci il link</div>
  @enderror
    </div>
 </div>

</div>


<div class="mb-3">
  <label for="content" class="form-label">Descrizione progetto</label>
  <textarea class="form-control  @error('content') is-invalid @enderror" id="content" name="content" rows="5"></textarea>
   @error('content')
  <div class="is-invalid">{{$message}}</div>
  @else
  <div class=" text-muted">Inserisci il contenuto</div>
  @enderror



    </div>

</div>
<hr>

<footer class="d-flex justify-content-between bg-white container">
   <a href="{{route('admin.projects.index')}}" class="btn btn-outline-success"><i class="fa solid fa-arrow-left "></i>Torna indietro</a>
    <button type="submit" class="btn btn-outline-secondary"><i class="fa-solid fa-download"></i> Salva</button>
</footer>
</form>


@section('scrips')
<script>

</script>
@endsection