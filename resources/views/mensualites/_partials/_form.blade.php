
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
            // data.map(a=>{
              niveau ='<option value="'+ data.titre+'">'+ data.titre+'</option>'
            // })
            $('#titre').html(niveau)
          }
          });
	});
});
  </script>      