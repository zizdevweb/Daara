<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 row">
  
        <div class="form-group col-xs-6 col-sm-6 col-md-6">
            <strong>Mois</strong>
            <select name="mois" class="custom-select form-control  @error('mois') is-invalid @enderror">
             <option value="">Selectionner mois...</option>
             <option value="Janvier">Janvier</option>
             <option value="Fevrier">Fevrier</option>
             <option value="Mars">Mars</option>
             <option value="Avril">Avril</option>
             <option value="Mai">Mai</option>
             <option value="Juin">Juin</option>
             <option value="Juillet">Juillet</option>
             <option value="Aout">Aout</option>
             <option value="Septembre">Septembre</option>
             <option value="Octobre">Octobre</option>
             <option value="Novembre">Novembre</option>
             <option value="Decembre">Decembre</option>
            </select>
            <div class="invalid-feedback">
              @if($errors->has('mois'))
               {{ $errors->first('mois') }}
              @endif
            </div>
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6">
            <strong>Net à Payer</strong>
            <input type="number" id="net_a_payer" name="net_a_payer" value="{{ isset($mensualite) ? $mensualite->net_a_payer :''}}" autocomplete="off" class="form-control @error('net_a_payer') is-invalid @enderror" placeholder="Montant net a payer...">
              <div class="invalid-feedback">
                    @if($errors->has('net_a_payer'))
                     {{ $errors->first('net_a_payer') }}
                    @endif
              </div>			
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6">
            <strong>Montant Verser</strong>
            <input type="number" id="montant_verser" name="montant_verser" value="{{ isset($mensualite) ? $mensualite->montant_verser :''}}" autocomplete="off" class="form-control @error('montant_verser') is-invalid @enderror" placeholder="Montant Verser...">
              <div class="invalid-feedback">
                    @if($errors->has('montant_verser'))
                     {{ $errors->first('montant_verser') }}
                    @endif
              </div>			
        </div>
        <div class="form-group col-xs-6 col-sm-6 col-md-6">
            <strong>Montant Restant</strong>
            <input type="number" id="montant_restant" name="montant_restant" value="{{ isset($mensualite) ? $mensualite->montant_restant :''}}" autocomplete="off" class="form-control @error('montant_restant') is-invalid @enderror" placeholder="Montant Restant...">
              <div class="invalid-feedback">
                    @if($errors->has('montant_restant'))
                     {{ $errors->first('montant_restant') }}
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
          @if(!isset($eleves))
          <div class="form-group col-xs-6 col-sm-6 col-md-6">
            <strong>eleve</strong>
            <select name="eleve_id" id="eleve_id" class="custom-select form-control  @error('eleve_id') is-invalid @enderror">
             <option value="">eleve...</option>
             @foreach ($eleves as $eleve)
              <option value="{{$eleve->id}} {{ old('eleve_id') == ($eleve->id) ? 'selected' : '' }} {{$eleve->eleve_id == $eleve->id ? 'selected':'' }}">{{$eleve->prenom}} {{$eleve->nom}}</option>
             @endforeach
            </select>
            <div class="invalid-feedback">
              @if($errors->has('eleve_id'))
               {{ $errors->first('eleve_id') }}
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
    $(document).ready(function(){
      $('#montant_verser').keyup(function(){
        var net_a_payer= $('#net_a_payer').val();
        var montant_verser= $('#montant_verser').val();
        var montant_restant = net_a_payer - montant_verser;
        if(montant_restant < 0)
        {
        $('#montant_restant').val(null)  
        }else
        $('#montant_restant').val(montant_restant )
      });
    });

      $(document).ready(function() {
      $('select[name=niveau]').change(function () {
      var niveau='<option value="">Niveau(x)</option>'
      $.ajax({
      type: "GET",
      url: "/api/eleves/niveau",
      dataType: "json",
      success: function(data) {
      console.log(data);
            var titres= data;
      titres.map(a=>{
            niveau+='<option value="'+ a.titre+'">'+a.titre+'</option>'
      })
      $('#titre').html(niveau)
      }
      });
      });
      });
  </script>      