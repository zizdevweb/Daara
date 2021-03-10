@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modification Tuteur</h2>
            </div>
        </div>
    </div>
    <form action="{{ route('tuteurs.update', $tuteur->id) }}" method="POST" >
        @csrf
        @method('PATCH')

        @include('tuteurs._partials._form')

    </form>
    
@endsection