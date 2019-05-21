
<!-- Selectize -->
<link rel="stylesheet" href="https://selectize.github.io/selectize.js/css/selectize.default.css" >
<script src="https://selectize.github.io/selectize.js/js/selectize.js"></script>


<div class="row">
  
<div class="col-md-12">
  
<form id="busqueda" autocomplete="off" class="form-inline">
  
<input type="date" name="fechaini" class="form-control fechaini" required >

<input type="date" name="fechafin" class="form-control fechafin" required >


<button class="btn btn-primary"><i class="fa fa-search"></i></button>



</form>

</div>


</div>

<hr>

<div class="row">
  
<div class="col-md-12">
 


  
    <div class="table-responsive">
     	<table id="consulta"  class="table table-hover table-condensend" style="font-size: 12px">
     		<thead>
     			<tr class="table-active">

              <th>Id</th>
              <th>Fecha</th>
              <th>Operación</th>
              <th>Estado</th>
              <th>Detalle</th>
              <th>IMEI</th>
              <th>Telefóno</th>
              <th>PVP</th>
              <th>Nombre</th>
              <th>Autor</th>
              <th>Fact./alb.</th>
                      
     			</tr>
     		</thead>
     	</table>
     </div>

</div>

</div>

</div>

<script>


function loadData(fechaini='',fechafin='')
{

$(document).ready(function (){

$.getJSON('sources/registro.php?op=2',{},function(data){

 $('.fechaini').val(data.fechaini);
 $('.fechafin').val(data.fechafin);

});

//$("#consulta").dataTable().fnDestroy();
$('#consulta').dataTable({

 //"order": [[ 4, "desc" ]],
//dom: 'Bfrtip',
"destroy":true,
 "deferRender": true,
"bAutoWidth": false,
"iDisplayLength": 25,
"language": {
"url": "assets/js/spanish.json"
},
"bProcessing": true,
"sAjaxSource": "sources/registro.php?op=1",
"fnServerParams": function ( aoData ) {
      aoData.push( 
        { "name":"fechaini", "value": fechaini },
        { "name":"fechafin", "value": fechafin }  
        );
    },
"aoColumns": [



{ mData: 'id'},
{ mData: 'Fecha'},
{ mData: 'Operacion'},
{ mData: 'Estado'},
{ mData: 'Modelo'},
{ mData: 'IMEI'},
{ mData: 'Telefono'},
{ mData: 'Pagar'},
{ mData: 'Cliente'},
{ mData: 'userCreate'},
{ mData: null,render:function(){

return '';


}}




]

});

 });

}
//Cargar Data
loadData();


//Busqueda
$(document).on('submit','#busqueda',function(e){

 e.stopImmediatePropagation();

 fechaini = $('.fechaini').val();
 fechafin = $('.fechafin').val();

 loadData(fechaini,fechafin);

e.preventDefault();
});



</script>

