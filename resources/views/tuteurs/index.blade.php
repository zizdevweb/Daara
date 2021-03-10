@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <br><h2>Liste des Tuteurs</h2><br>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 row">
            <div class="col-xs-9 col-sm-9 col-md-9">     
                 <div class="form-group">
                     <a class="btn btn-secondary" href="{{ route('tuteurs.create') }}"><i class="fas fa-plus"></i> Ajouter tuteur</a>
                   
                 </div>
             </div>   
             <div class="col-xs-3 col-sm-3 col-md-3">     
                 <div class="form-group">
                     <form action="{{ route('tuteurs.index') }}" method="GET" role="search">
                         <div class="d-flex">
                             <input type="text" class="form-control mr-2" name="term" placeholder="Rechercher ici " id="term">
                             <button class="btn btn-info t" type="submit" title="recherche un produit">
                                 <span class="fas fa-search"></span>
                             </button>
                         </div>
                     </form><br>
                 </div>
             </div>   
         </div>    
         
    </div>
</div>
<style>
    svg{
        display: none;
    }
</style>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div> 

    @endif
<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12 row"><br>
    <table class="table table-striped table-hover col-md-12">
        <thead class="" style="background-color: #4656E9;">
    <tr>
        <th style="color: white;">#</th>
        <th style="color: white;">Prenom</th>
        <th style="color: white;">Nom</th>
        <th style="color: white;">Telephone</th>
        <th style="color: white;">Email</th>
        <th style="color: white;">Adresse</th>
        <th style="color: white;">Sexe</th>
        <th style="color: white;">Action</th>
    </tr>
        </thead>
    @foreach ($tuteurs as $key=>$tuteur)
    <tr>
        <td onclick="showtuteur({{ $tuteur->id}})" style="cursor: pointer; text-transform: capitalize;">{{ $key+1}}</td>
        <td onclick="showtuteur({{ $tuteur->id }})" style="cursor: pointer; text-transform: capitalize;">{{ $tuteur->prenom}}</td>
        <td onclick="showtuteur({{ $tuteur->id }})" style="cursor: pointer; text-transform: capitalize;">{{ $tuteur->nom}}</td>
        <td onclick="showtuteur({{ $tuteur->id }})" style="cursor: pointer; text-transform: capitalize;">{{ $tuteur->telephone}}</td>
        <td onclick="showtuteur({{ $tuteur->id }})" style="cursor: pointer; text-transform: capitalize;">{{ $tuteur->email}}</td>
        <td onclick="showtuteur({{ $tuteur->id }})" style="cursor: pointer; text-transform: capitalize;">{{ $tuteur->adresse}}</td>
        <td onclick="showtuteur({{ $tuteur->id }})" style="cursor: pointer; text-transform: capitalize;">{{ $tuteur->sexe}}</td>
   
        <td>
                <a class="btn btn-primary  p-0 pr-2 pl-2" href="{{ route('tuteurs.edit',$tuteur->id) }}"><i class="fas fa-edit"></i></a>
                <button type="button" class="btn btn-danger  p-0 pr-2 pl-2" data-toggle="modal" data-target="#exampleModal{{ $tuteur->id }}">
                    <i class="fas fa-trash"></i>
                </button> 
                <div class="modal fade" id="exampleModal{{ $tuteur->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5>Voulez vous vraiment supprimer <strong> {{ $tuteur->prenom }} {{ $tuteur->nom }} de liste des tuteur</strong>  ?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <form action="{{route('tuteurs.destroy',$tuteur->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                        </div>
                    </div>
                </div>
            
        </td>
    </tr>
        
    @endforeach
</table>
</div>
</div>
<div class="row">
    <div class="col-md-12 mt-3 d-flex justify-content-center">
        {!! $tuteurs->links() !!}
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<script>
    function showtuteur(id)
    {
        window.location = '/tuteurs/'+id;
    }
</script>
@endsection