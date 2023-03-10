
@if(session('msg'))
<div class="alert alert-{{sesion('type')?? 'info'}} mt-5">
    {{session('msg')}}
</div>
@endif