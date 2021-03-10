@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modification Eleve</h2>
            </div>
        </div>
    </div>
    <form action="{{ route('eleves.update', $eleve->id) }}" method="POST" >
        @csrf
        @method('PATCH')

        @include('eleves._partials._form')

    </form>
    
@endsection