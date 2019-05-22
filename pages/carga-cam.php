
<div class="row">
  
<div class="col-md-12">


<form id="agregar" autocomplete="off" >

<div class="card">
  <div class="card-header">
   <i class="fa fa-file-excel-o"></i> CAM PREPAGO
  </div>
  <div class="card-body">

  <div class="form-group">
  <label >Archivo Excel</label>
  <input type="file" class="form-control" name="archivo" required>
  </div>


  <div class="form-group">
  <label>Número de Filas</label>
  <input type="number" name="fila" class="form-control" required min="1">
  </div>


  <div class="form-group">
  <label>Fecha de Carga</label>
  <input type="date" name="fecha_carga" class="form-control" required>
  </div>

  </div>

  <div class="card-footer">
  
  <button type="submit"  class="btn btn-primary"><i class="fa fa-upload"></i>  Subir</button>

  </div>

</div>

</form>
  


</div>

</div>

<script>
$('#agregar').submit(function (event){
var parametros =  $(this).serialize();
$.ajax({
url:"sources/carga-cam.php?op=1",
type:"POST",
data: new FormData(this),
contentType: false,
cache: false,
processData:false,
beforeSend:function(){

swal({
  title: "Subiendo Archivo",
  imageUrl:"assets/img/loader2.gif",
  text:  "Espere un momento, no cierre la ventana.",
 // timer: 3000,
  showConfirmButton: false
});

},
success:function(data){

swal({
  title: "Buen Trabajo",
  text:  "Archivo Cargado",
  type:  "success",
  timer: 3000,
  showConfirmButton: false
});


}
});
event.preventDefault();
});
</script>