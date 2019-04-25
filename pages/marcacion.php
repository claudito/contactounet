

<div class="row">
	
<div class="col-md-6">
	

<form id="marcar" autocomplete="off">
	
<div class="input-group">
	<input type="text" name="dni" class="form-control" placeholder="Ingrese el Número de DNI" 
	 pattern="[0-9]{8}" size="8" maxlength="8"  minlength="8" required>
	<span class="input-group-btn">
		<button type="submit" class="btn btn-primary"><i class="fa fa-clock-o"></i> Marcar </button>
	</span>
</div>


</form>

</div>


<div class="col-md-6">
  
<table>
<tr><td style="text-align: center;"><canvas id="canvas_tt5c92c61c8e013" width="250" height="250"></canvas></td></tr>
<tr><td style="text-align: center; font-weight: bold"><a href="//24timezones.com/es_husohorario/lima_hora_actual.php" style="text-decoration: none" class="clock24" id="tz24-1553122844-c1131-eyJzaXplIjoiMjUwIiwiYmdjb2xvciI6IjAwMDA2NiIsImxhbmciOiJlcyIsInR5cGUiOiJhIiwiY2FudmFzX2lkIjoiY2FudmFzX3R0NWM5MmM2MWM4ZTAxMyJ9" title="Lima husos horarios" target="_blank" rel="nofollow">Lima</a></td></tr>
</table>
<script type="text/javascript" src="//w.24timezones.com/l.js" async></script>



<div class="cleanslate w24tz-current-time w24tz-large" style="display: inline-block !important; visibility: hidden !important; min-width:300px !important; min-height:145px !important;"><p><a href="//24timezones.com/es_husohorario/lima_hora_actual.php" style="text-decoration: none" class="clock24" id="tz24-1553122794-c1131-eyJob3VydHlwZSI6IjEyIiwic2hvd2RhdGUiOiIxIiwic2hvd3NlY29uZHMiOiIxIiwiY29udGFpbmVyX2lkIjoiY2xvY2tfYmxvY2tfY2I1YzkyYzVlYTVkNDQyIiwidHlwZSI6ImRiIiwibGFuZyI6ImVzIn0=" title="Lima husos horarios" target="_blank" rel="nofollow">Hora actual en Lima</a></p><div id="clock_block_cb5c92c5ea5d442"></div></div>
<script type="text/javascript" src="//w.24timezones.com/l.js" async></script>


  
</div>


</div>

<script>
$(document).on('submit','#marcar',function(e){

e.stopImmediatePropagation();

parametros = $(this).serialize();

$.ajax({

url:"sources/marcacion.php?op=1",
type:"POST",
dataType :"JSON",
data:parametros,
beforeSend:function(){

swal({
  title: "Cargando",
  imageUrl:"assets/img/loader2.gif",
  text:  "Espere un momento, no cierre la ventana.",
  timer: 3000,
  showConfirmButton: false
});


},
success:function(data)
{

$('#marcar')[0].reset();

swal({
  title: data.title,
  type:  data.type,
  text:  data.text,
  timer: 3000,
  showConfirmButton: false
});


}

});

e.preventDefault();
});	


</script>