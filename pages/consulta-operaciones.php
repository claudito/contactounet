<!-- Selectize -->
<link rel="stylesheet" href="https://selectize.github.io/selectize.js/css/selectize.default.css" >
<script src="https://selectize.github.io/selectize.js/js/selectize.js"></script>

<div class="row">
  
<div class="col-md-12">
 


  
    <div class="table-responsive">
     	<table id="consulta"  class="table table-hover table-condensend" style="font-size: 12px">
     		<thead>
     			<tr class="table-active">

              <th>Id</th>
              <th>Fecha</th>
              <th>Operación</th>
              <th>Cliente</th>
              <th>Estado</th>
              <th>Id Order</th>
              <th>Order Action Id</th>
              <th>Modelo</th>
              <th>IMEI</th>
              <th>Comercial</th>
              <th>Contrato</th>
              <th>Telefóno</th>
              <th>Monto</th>
              <th>F. de Pago</th>
              <th>Observaciones</th>


                    

                      
     			</tr>
     		</thead>
     	</table>
     </div>

</div>

</div>

</div>





<script>
function loadData()
{

 $(document).ready(function (){

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
"sAjaxSource": "sources/consulta-operaciones.php?op=1",
"aoColumns": [

{ mData: 'id'},
{ mData: 'Fecha'},
{ mData: 'Operacion'},
{ mData: 'Cliente'},
{ mData: 'Estado'},
{ mData: 'idOrder'},
{ mData: 'orderActionId'},
{ mData: 'Modelo'},
{ mData: 'IMEI'},
{ mData: 'NombreComercial'},
{ mData: 'Contrato'},
{ mData: 'Telefono'},
{ mData: 'Pagar'},
{ mData: 'FormaPago'},
{ mData: 'Observaciones'}



]

});

 });

}
//Cargar Data
loadData();


</script>

