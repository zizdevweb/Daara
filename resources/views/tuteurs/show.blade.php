@extends('layout.master')
@section('content')
    <div class="row ml-1" style="justify-content:center;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                    <div  class="card d-flex justify-content-center mr-2" style="width: 18rem; justify-content: center; text-align: center; cursor: pointer;">
          
                          <img class="d-flex justify-content-center " style="align-self:center;width: 100px ; height: 100px; border-radius: 50%;" src="https://ui-avatars.com/api/?background=random&color=fff&name={{$tuteur->prenom}} {{$tuteur->nom}}" alt="Card image cap">
                          <div class="card-body" style="justify-content: center; text-align: center;">
                            <h5 class="card-title">{{ $tuteur->prenom}} {{ $tuteur->nom}}</h5>
                            <p class="card-text"><a style="text-decoration: none;" href="mailto:{{ $tuteur->email}}">{{ $tuteur->email}} </a><br> <span class="{{$tuteur->sexe=='homme'? 'badge badge-success':'badge badge-primary'}}">{{ $tuteur->sexe}}</span> </p>
                            <a href="{{ route('tuteurs.edit',$tuteur->id) }}" class="btn btn-primary btn-blok"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-blok"><i class="fas fa-trash"></i></a>
                          </div>
                    </div>
            </div>
        </div>    
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
            <div class="pull-right py-3">
                 <a class="btn btn-secondary" href="{{route('tuteurs.eleves.create',['tuteur'=>$tuteur->id])}}"><i class="fas fa-plus"></i> Affilier Eleve</a>
             </div>
             <table class="table table-striped table-hover">
                 <thead class="" style="background-color: #4656E9;">
                     <tr>
                         <th style="color: white;">N<sup>o</sup></th>
                         <th style="color: white;">Prenom</th>
                         <th style="color: white;">Nom</th>
                         <th style="color: white;">Naissance</th>
                         <th style="color: white;">Sexe</th>
                         <th style="color: white;">Niveau</th>
                     </tr>
                 </thead>
                 @foreach ($eleves as $key=>$eleve)
                 <tr>
                    <td>{{$eleve->$key+1}}</td>
                    <td>{{$eleve->prenom}}</td>
                    <td>{{$eleve->nom}}</td>
                    <td>{{$eleve->naissance}}</td>
                    <td>{{$eleve->sexe}}</td>
                    <td>{{$eleve->niveau}}</td>
                </tr> 
                @endforeach
             </table>
          </div>
          <div class="row">
            <div class="col-md-12 mt-3 d-flex justify-content-center">
                {{-- {!! $interventions->links() !!} --}}
            </div>
        </div>
         <div class="row">
             <div class="col-md-12 ml-3 mt-3">
                 <a class="btn btn-secondary" href="{{ route('tuteurs.index') }}"><i class="fas fa-angle-left"></i> Retour</a>
             </div>
          </div>
            
     </div>

    </div>

@endsection   