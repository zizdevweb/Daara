@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <br><h2>Liste des Factures</h2><br>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 row">
            <div class="col-xs-9 col-sm-9 col-md-9">     
                 <div class="form-group">
                     {{-- <a class="badge bg-light" href="{{ route('mensualites.create') }}"><i class="fas fa-plus"></i> Nouvelle Facture</a> --}}
                   
                 </div>
             </div>   
             <div class="col-xs-3 col-sm-3 col-md-3">     
                 <div class="form-group">
                     <form action="{{ route('mensualites.index') }}" method="GET" role="search">
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
        <th style="color: white;">N <sup>o</sup></th>
        <th style="color: white;">Mois</th>
        <th style="color: white;">Net a Payer</th>
        <th style="color: white;">Montant Verser</th>
        <th style="color: white;">Reste a Payer</th>
        <th style="color: white;">Date Paiement</th>
        <th style="color: white;">Action</th>
    </tr>
        </thead>
    @foreach ($mensualites as $key=>$mensualite)
    <tr>
        <td onclick="showmensualite({{ $mensualite->id}})" style="cursor: pointer; text-transform: capitalize;">{{ $key+1}}</td>
        <td onclick="showmensualite({{ $mensualite->id }})" style="cursor: pointer; text-transform: capitalize;">{{ $mensualite->mois}}</td>
        <td onclick="showmensualite({{ $mensualite->id }})" style="cursor: pointer; text-transform: capitalize;">{{ $mensualite->net_a_payer}}</td>
        <td onclick="showmensualite({{ $mensualite->id }})" style="cursor: pointer; text-transform: capitalize;">{{ $mensualite->montant_verser}}</td>
        <td onclick="showmensualite({{ $mensualite->id }})" style="cursor: pointer; text-transform: capitalize;">{{ $mensualite->montant_restant}}</td>
        <td onclick="showmensualite({{ $mensualite->id }})" style="cursor: pointer; text-transform: capitalize;">{{ $mensualite->created_at}}</td>
        <td>
                <a class="btn btn-primary  p-0 pr-2 pl-2" href="{{ route('mensualites.edit',$mensualite->id) }}"><i class="fas fa-edit"></i></a>
                <button type="button" class="btn btn-danger  p-0 pr-2 pl-2" data-toggle="modal" data-target="#exampleModal{{ $mensualite->id }}">
                    <i class="fas fa-trash"></i>
                </button> 
                <div class="modal fade" id="exampleModal{{ $mensualite->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5>Voulez vous vraiment supprimer <strong> {{ $mensualite->prenom }} {{ $mensualite->nom }} de liste des mensualite</strong>  ?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <form action="{{route('mensualites.destroy',$mensualite->id)}}" method="POST">
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
        {!! $mensualites->links() !!}
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<script>
    function showmensualite(id)
    {
        window.location = '/mensualites/'+id;
    }
</script>
@endsection