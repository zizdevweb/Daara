@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Nouvelle Facture</h2>
        </div>
    </div>
</div>

<form action="{{route('eleves.mensualites.store',['elefe'=>$elefe->id])}}" method="POST">
  @csrf
    @include('mensualites._partials._form')
</form>
@endsection