<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 row">
  
      <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <strong>Prenom</strong>
          <input type="text" name="prenom" value="{{ isset($tuteur) ? $tuteur->prenom :''}}" autocomplete="off" class=" form-control @error('prenom') is-invalid @enderror" placeholder="prenom...">
          <div class="invalid-feedback">
                @if($errors->has('prenom'))
                 {{ $errors->first('prenom') }}
                @endif
          </div>
      </div>
  
      <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <strong>Nom </strong>
        <input type="text" name="nom" value="{{ isset($tuteur) ? $tuteur->nom :''}}" autocomplete="off" class="form-control @error('nom') is-invalid @enderror" placeholder="nom...">
          <div class="invalid-feedback">
                @if($errors->has('nom'))
                 {{ $errors->first('nom') }}
                @endif
          </div>	
        <div class="invalid-feedback">
          @if($errors->has('nom'))
           {{ $errors->first('nom') }}
          @endif
        </div>		
      </div> 
  
      <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <strong>Adresse email </strong>
        <input type="email" name="email" value="{{ isset($tuteur) ? $tuteur->email :''}}" autocomplete="off" class="form-control @error('email') is-invalid @enderror" placeholder="email...">
          <div class="invalid-feedback">
                @if($errors->has('email'))
                 {{ $errors->first('email') }}
                @endif
          </div>			
      </div>
      <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <strong>Numero telephone </strong>
        <input type="number" name="telephone" value="{{ isset($tuteur) ? $tuteur->telephone :''}}" autocomplete="off" class="form-control @error('telephone') is-invalid @enderror" placeholder="telephone...">
          <div class="invalid-feedback">
                @if($errors->has('telephone'))
                 {{ $errors->first('telephone') }}
                @endif
          </div>			
      </div>
      <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <strong>Adresse</strong>
        <textarea class="form-control" name="adresse" rows="3" placeholder="Entrer les observation issus du diagnostic"> {{ isset($diagnostic) ? $diagnostic->description :''}}</textarea>
      </div>
      <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <strong>Sexe:</strong>
        <select name="sexe" id="" class="form-control">
          <option value="homme">Homme</option>
          <option value="femme">Femme</option>
        </select>
      </div>
  
    </div>
  
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <a class="btn btn-primary" href="{{ route('tuteurs.index') }}">Retour</a>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
  
  </div>
  