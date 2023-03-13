@if (@isset($project))
    
<form action="{{route('admin.projects.update', $project->id)}}" method="POST">
</form> 
  @method('PUT')
  @else
<form action="{{route('admin.projects.store')}}" method="POST"></form>    
@endif
<form action="{{route('admin.projects.store')}}" method="POST">
@csrf
<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
  <label for="title" class="form-label">Titolo Progetto</label>
  <input type="text" class="form-control" id="title" name="title" required>
  <div class=" text-muted">Inserisci il titolo</div>
</div>

</div>
 <div class="col-md-4">
        <div class="mb-3">
  <label for="image" class="form-label">Immagine</label>
  <input type="url" class="form-control" id="image" name="image">
  <div class=" text-muted">Inserisci immagine</div>
    </div>
 </div>
 <div class="col-md-4">
        <div class="mb-3">
  <label for="link" class="form-label">Link Progetto</label>
  <input type="link" class="form-control" id="link" name="link">
  <div class=" text-muted">Inserisci immagine</div>
    </div>
 </div>

</div>


<div class="mb-3">
  <label for="content" class="form-label">Descrizione progetto</label>
  <textarea class="form-control" id="content" name="content" rows="5"></textarea>



    </div>

</div>
<hr>

<footer class="d-flex justify-content-between bg-white container">
   <a href="{{route('admin.projects.index')}}" class="btn btn-outline-success"><i class="fa solid fa-arrow-left "></i>Torna indietro</a>
    <button type="submit" class="btn btn-outline-secondary"><i class="fa-solid fa-download"></i> Salva</button>
</footer>
</form>