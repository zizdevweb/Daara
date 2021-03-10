@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modification Facture</h2>
            </div>
        </div>
    </div>
    <form action="{{ route('mensualites.update', $mensualite->id) }}" method="POST" >
        @csrf
        @method('PATCH')

        @include('mensualites._partials._form')

    </form>
    
@endsection