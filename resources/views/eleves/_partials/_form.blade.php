<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 row">
  
      <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <strong>Prenom </strong>
          <input type="text" name="prenom" value="{{ isset($eleve) ? $eleve->prenom :''}} {{old('prenom')}}"  class=" form-control @error('prenom') is-invalid @enderror">
          <div class="invalid-feedback">
                @if($errors->has('prenom'))
                 {{ $errors->first('prenom') }}
                @endif
          </div>
      </div>
  
      <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <strong>Nom </strong>
        <input type="text" name="nom" value="{{ isset($eleve) ? $eleve->nom :''}} {{old('nom')}}"  class="form-control @error('nom') is-invalid @enderror" >
          <div class="invalid-feedback">
                @if($errors->has('nom'))
                 {{ $errors->first('nom') }}
                @endif
          </div>		
      </div> 
  
      <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <strong>Date de Naissance :</strong>
        <input type="date" name="naissance" value="{{ isset($eleve) ?$eleve->naissance:''}} {{old('naissance')}} "  class="form-control @error('naissance') is-invalid @enderror" >
          <div class="invalid-feedback">
                @if($errors->has('naissance'))
                 {{ $errors->first('naissance') }}
                @endif
          </div>			
      </div>

      <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <strong>Sexe </strong>
        <select name="sexe" class="custom-select form-control @error('sexe') is-invalid @enderror">
          <option value="garcon">Garcon</option>
          <option value="fille">Fille</option>
        </select>	
        <div class="invalid-feedback">
          @if($errors->has('sexe'))
           {{ $errors->first('sexe') }}
          @endif
        </div>		
      </div>
  
      <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <strong>Niveau</strong>
        <select name="niveau" id="juzz" class="custom-select form-control  @error('niveau') is-invalid @enderror">
         <option value="">Hizib ...</option>
         @foreach ($niveaux as $niveau)
          <option value="{{$niveau->id}} {{($niveau->niveau_id == $niveau->id) ?'select':''}} ">{{$niveau->juzz}}</option> 
         @endforeach
        </select>
        <div class="invalid-feedback">
          @if($errors->has('niveau'))
           {{ $errors->first('niveau') }}
          @endif
        </div>
      </div>
      <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <strong>Titre</strong>
        <select name="titre" id="titre" class="custom-select form-control  @error('titre') is-invalid @enderror">
         <option value="">titre...</option>
        </select>
        <div class="invalid-feedback">
          @if($errors->has('titre'))
           {{ $errors->first('titre') }}
          @endif
        </div>
      </div>
      @if(!isset($tuteur))
      <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <strong>Tuteurs</strong>
        <select name="tuteur_id" id="tuteur_id" class="custom-select form-control  @error('tuteur_id') is-invalid @enderror">
         <option value="">tuteur...</option>
         @foreach ($tuteurs as $tuteur)
          <option value="{{$tuteur->id}} {{ old('tuteur_id') == ($tuteur->id) ? 'selected' : '' }} {{$tuteur->tuteur_id == $tuteur->id ? 'selected':'' }}">{{$tuteur->prenom}} {{$tuteur->nom}}</option>
         @endforeach
        </select>
        <div class="invalid-feedback">
          @if($errors->has('tuteur_id'))
           {{ $errors->first('tuteur_id') }}
          @endif
        </div>
      </div>
      @endif
    </div>
  
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <a class="btn btn-primary" href="{{ route('eleves.index') }}">Retour</a>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
  
  </div>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script>
$(document).ready(function() {
	$('select[name=niveau]').change(function () {
		var niveau='<option value="">Niveau(x)</option>'
    $.ajax({
          type: "GET",
          url: "/api/eleves/niveau",
          dataType: "json",
          success: function(data) {
            console.log(data);
            // titres.map(a=>{
              niveau ='<option value="'+ data.titre+'">'+ data.titre+'</option>'
            // })
            $('#titre').html(niveau)
          }
          });
	});
});
</script>