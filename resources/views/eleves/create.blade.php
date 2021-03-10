@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ajout Eleve</h2>
        </div>
    </div>
</div>

<form action="{{route('tuteurs.eleves.store',['tuteur'=>$tuteur->id]) }}" method="POST">
  @csrf
    @include('eleves._partials._form')
</form>
@endsection