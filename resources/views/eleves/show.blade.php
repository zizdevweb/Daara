@extends('layout.master')
@section('content')
    <div class="row ml-1" style="justify-content:center;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                    <div  class="card d-flex justify-content-center mr-2" style="width: 18rem; justify-content: center; text-align: center; cursor: pointer;">
          
                          <img class="d-flex justify-content-center " style="align-self:center;width: 100px ; height: 100px; border-radius: 50%;" src="https://ui-avatars.com/api/?background=random&color=fff&name={{$eleve->prenom}} {{$eleve->nom}}" alt="Card image cap">
                          <div class="card-body" style="justify-content: center; text-align: center;">
                            <h5 class="card-title">{{ $eleve->prenom}} {{ $eleve->nom}}</h5>
                            <a href="{{ route('eleves.edit',$eleve->id) }}" class="btn btn-primary btn-blok"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-blok"><i class="fas fa-trash"></i></a>
                          </div>
                      </div>

            </div>
        </div>    
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
            <div class="pull-right py-3">
                 <a class="btn btn-secondary" href="{{route('eleves.mensualites.create',['elefe'=>$eleve->id])}}"><i class="fas fa-plus"></i> Rediger Facture</a>
             </div>
             <table class="table table-striped table-hover">
                 <thead class="" style="background-color: #4656E9;">
                     <tr>
                         <th style="color: white;">N<sup>o</sup> Factures</th>
                         <th style="color: white;">Mois</th>
                         <th style="color: white;">Net Verser</th>
                         <th style="color: white;">Montant Restant</th>
                         <th style="color: white;">Restant Payer</th>
                         <th style="color: white;">Niveau</th>
                         <th style="color: white;">Action</th>
                     </tr>
                 </thead>
                 @foreach ($mensualites as $key=>$mensualite)
                 <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$mensualite->mois}}</td>
                    <td>{{$mensualite->net_a_payer}}</td>
                    <td>{{$mensualite->montant_verser}}</td>
                    <td>{{$mensualite->montant_restant}}</td>
                    <td>Hizib {{$mensualite->niveau}}</td>
                    <td>
                        <a class="btn btn-primary  p-0 pr-2 pl-2" href="{{route('eleves.mensualites.edit',['elefe' => $eleve->id, 'mensualite'=>$mensualite->id])}}"><i class="fas fa-edit"></i></a>
                        <button type="button" class="btn btn-danger  p-0 pr-2 pl-2" data-toggle="modal" data-target="#exampleModal{{ $eleve->id }}">
                            <i class="fas fa-trash"></i>
                        </button>

                        <div class="modal fade" id="exampleModal{{ $eleve->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h5>Voulez vous supprimer  cette intervention</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <form action="{{route('eleves.mensualites.destroy',['elefe' => $eleve->id, 'mensualite'=>$mensualite->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr> 
                @endforeach
             </table>
          </div>
          <div class="row">
            <div class="col-md-12 mt-3 d-flex justify-content-center">
                {!! $mensualites->links() !!}
            </div>
        </div>
         <div class="row">
             <div class="col-md-12 ml-3 mt-3">
                 <a class="btn btn-secondary" href="{{ route('eleves.index') }}"><i class="fas fa-angle-left"></i> Retour</a>
             </div>
          </div>
            
     </div>

    </div>

@endsection   