@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ajout tuteur</h2>
        </div>
    </div>
</div>

<form action="{{ route('tuteurs.store') }}" method="POST">
  @csrf
    @include('tuteurs._partials._form')
    
</form>
@endsection