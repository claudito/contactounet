<!-- Formulario de Registro -->
<form id="agregar" autocomplete="off" novalidate>

<div class="card">


  <div class="card-header">
  <i class="fa fa-plus"></i> CREAR NUEVA OPERACIÓN
  </div>

<input type="hidden" name="id" class="id">
<input type="hidden" name="type" class="type">

<div class="card-body">

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Fecha:</label>
<div class="col-sm-3">
<input type="date"  class="form-control form-control-sm" name="fecha" value="<?=  date('Y-m-d') ?>" required>
</div>
<label  class="col-sm-1 col-form-label">Estado:</label>
<div class="col-sm-3">
<select name="estado"  class="estado form-control form-control-sm" required placeholder="Estado"></select>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Cliente:</label>
<div class="col-sm-2">
<button  type="button" class="btn btn-success btn-nuevo-cliente btn-sm btn-block"><i class="fa fa-plus"></i> Crear Cliente</button>
</div>
<div class="col-sm-8">
<select   class="demo-default cliente" name="cliente" required placeholder="Buscar Cliente"></select>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Id Order:</label>
<div class="col-sm-3">
<input type="text"  class="form-control form-control-sm" name="id_order" pattern="[0-9]+"  minlength="8" maxlength="8" required>
</div>
<label  class="col-sm-2 col-form-label">Order Action Id:</label>
<div class="col-sm-3">
<input type="text"  class="form-control form-control-sm" name="order_action" pattern="[0-9]+"  minlength="8" maxlength="8" required>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Modelo:</label>
<div class="col-sm-5">
<select   class="demo-default modelo" name="modelo" required placeholder="Modelo"></select>
</div>
<div class="col-sm-2">
<div class="checkbox"><label><input type="checkbox"   class="" checked>Mostrar Solo Stock</label></div>
</div>
<div class="col-sm-3">
<div class="checkbox"><label><input type="checkbox"   class="">Mostrar Descatalogados</label></div>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">IMEI:</label>
<div class="col-sm-5">
<input type="text" name="imei" class="imei form-control form-control-sm" required readonly>
</div>
</div>


<div class="form-group row">
<label  class="col-sm-2 col-form-label">Operación:</label>
<div class="col-sm-5">
<select   class="form-control operacion form-control-sm" name="operacion" required placeholder="Operación"></select>
</div>
<div class="col-sm-2">
<div class="checkbox"><label><input type="checkbox"   class="">Mostrar Todas</label></div>
</div>
<div class="col-sm-3">
<div class="checkbox"><label><input type="checkbox"   class="">Mostrar Obsoletas</label></div>
</div>
</div>




<div class="form-group row">
<label  class="col-sm-2 col-form-label label_codigo_biometrico">Código Biometrico:</label>
<div class="col-sm-2">
<input type="text" name="codigo_biometrico" pattern="[0-9]+" maxlength="8" minlength="8"  
class="codigo_biometrico form-control">
</div>
<label  class="col-sm-2 col-form-label label_codigo_tm">Código TM:</label>
<div class="col-sm-3">
<input type="text" name="codigo_tm" pattern="[0-9]+" maxlength="17" minlength="17"  
class="codigo_tm form-control form-control-sm">
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Comercial:</label>
<div class="col-sm-5">
<select   class="demo-default comercial" name="comercial" required placeholder="Sin Asignar"></select>
</div>
</div>



<div class="form-group row">
<label  class="col-sm-2 col-form-label">Contrato:</label>
<div class="col-sm-5">
<select   class="demo-default contrato" name="contrato" required placeholder="Contrato"></select>
</div>
</div>




<div class="form-group row">
<label  class="col-sm-2 col-form-label">Promoción / Campaña:</label>
<div class="col-sm-5">
<select   class="form-control promocion form-control-sm" name="promocion" placeholder="Promoción / Campaña"></select>
</div>
</div>


<div class="form-group row">
<label  class="col-sm-2 col-form-label">ICC:</label>
<div class="col-sm-5">
<select   class="form-control icc form-control-sm" name="icc" required placeholder=""></select>
</div>
</div>


<div class="form-group row">
<label  class="col-sm-2 col-form-label">Accesorio:</label>
<div class="col-sm-5">
<select   class="demo-default accesorio" name="accesorio"  placeholder="Accesorio"></select>
</div>

</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Telefóno:</label>
<div class="col-sm-3">
<input type="text" pattern="[0-9]+" maxlength="9" minlength="9"  class="form-control form-control-sm" name="telefono"  required>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">A Pagar:</label>
<div class="col-sm-3">
<input type="number" name="pago" class="form-control form-control-sm"  min="1" step="any" required>
</div>
</div>


<div class="form-group row">
<label  class="col-sm-2 col-form-label">Forma de Pago:</label>
<div class="col-sm-3">
<select name="forma_pago"  class="forma_pago form-control form-control-sm" required></select>
</div>
</div>


<div class="form-group row">
<label  class="col-sm-2 col-form-label">Observaciones:</label>
<div class="col-sm-6">
<textarea name="observacion"  rows="3" class="form-control form-control-sm" required></textarea>
</div>
</div>

</div>


<div class="card-footer">
<button class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar Operación</button>
</div>

</div>

</form>




<!-- Modal Nuevo Cliente -->
<form id="nuevo-cliente" autocomplete="off">
<div class="modal fade" id="modal-nuevo-cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">




    <div class="form-group">
    <select name="tipo_doc"  class="tipo_doc form-control">
    <option value="">Seleccionar</option>
    <option value="DNI">DNI</option>
    <option value="PASAPORTE">PASAPORTE</option>
    <option value="RUC">RUC</option>
    </select>
    </div>


    <div class="input-group mb-3">
    <input type="number" class="numero_cliente form-control" placeholder="Ingrese el número" aria-label="Recipient's username" aria-describedby="button-addon2">
    <div class="input-group-append">
    <button class="btn btn-outline-secondary btn-buscar-cliente" type="button" >Buscar</button>
    </div>
    </div>


    <hr>

    <div class="form-group">
    <label>Nombres</label>
    <input type="text" name="nombres" class="nombres form-control" required>
    </div>


    <div class="form-group">
    <label>Documento</label>
    <input type="text" name="documento" class="documento form-control" required>
    </div>


    <div class="form-group">
    <label>Condición</label>
    <input type="text" name="condicion" class="condicion form-control" required>
    </div>








      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- Modal IMEI -->
<div class="modal fade" id="modal-imei" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5  id="exampleModalLabel">IMEI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
       <div class="table-responsive">
         <table id="consulta_imei"  class="table table-hover table-sm" style="font-size: 12px">
           <thead class="thead-dark">
             <tr>
               <th>Punto de Venta</th>
               <th>Modelo</th>
               <th>IMEI</th>
               <th>Tipo</th>
               <th>Días</th>
             </tr>
           </thead>
         </table>
       </div>

      </div>
    </div>
  </div>
</div>


<script>

//Opciones Adicionales
$('.codigo_biometrico').hide();
$('.label_codigo_biometrico').hide();
$('.label_codigo_tm').hide();
$('.codigo_tm').hide();


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
"sAjaxSource": "sources/operacion.php?op=1",
"aoColumns": [

{ mData:  null,render:function(data){

acciones  = '<button type="button" class="btn btn-primary btn-edit btn-sm" data-id="'+data.id+'"><i class="fa fa-edit"></i></button>';
return acciones;

}},
{ mData: 'id'},
{ mData: 'Fecha'},
{ mData: 'Operacion'},
{ mData: 'Estado'},
{ mData: 'IMEI'},
{ mData: 'Telefono'},
{ mData: 'PVP'},
{ mData: 'Cliente'},
{ mData: 'Nombre'}

]

});

 });

}
//Cargar Data
loadData();


/*Inicio Cargar Clientes*/
$('.cliente').selectize({
maxItems: 1,
valueField: 'id',
labelField: 'name',
searchField: 'name',
options: [],
create: false,
load: function(query, callback) {
if (!query.length) return callback();

$.ajax({
url: 'sources/operacion.php?op=2',
type: 'GET',
dataType: 'json',
data: {
name: query,'tipo':'clientes'
},
error: function() {
callback();
},
success: function(res) {
callback(res);
}
});

}

});

/*Fin Cargar Clientes */


/*Inicio Cargar Estado Operación*/
estado = '';
$.getJSON('sources/operacion.php?op=2',{'tipo':'estado'},function(data){

data.forEach(function (row){

estado += '<option value="'+row.Nombre+'">'+row.Nombre+'</option>';

$('.estado').html(estado);
$('.estado').val('PREVENTA');

});

});

/*Fin Cargar Estado Operación */

/*Inicio Cargar de Modelos*/
$('.modelo').selectize({
maxItems: 1,
valueField: 'Nombre',
labelField: 'Nombre',
searchField: 'Nombre',
options: [],
create: false,
load: function(query, callback) {
if (!query.length) return callback();

$.ajax({
url: 'sources/operacion.php?op=2',
type: 'GET',
dataType: 'json',
data: {
name: query,'tipo':'modelo'
},
error: function() {
callback();
},
success: function(res) {
callback(res);

console.log(res);

}
});

}

});


/*Fin Cargar de Modelos */

/*Inicio Cargar de Accesorios*/
$('.accesorio').selectize({
maxItems: 1,
valueField: 'Nombre',
labelField: 'Nombre',
searchField: 'Nombre',
options: [],
create: false,
load: function(query, callback) {
if (!query.length) return callback();

$.ajax({
url: 'sources/operacion.php?op=2',
type: 'GET',
dataType: 'json',
data: {
name: query,'tipo':'accesorio'
},
error: function() {
callback();
},
success: function(res) {
callback(res);
}
});

}

});

/*Fin Cargar de Accesorios */

/*Inicio Carga de Operaciones*/
operacion = '<option value="">(Especifique Operación)</option>';
$.getJSON('sources/operacion.php?op=2',{'tipo':'operacion'},function(data){

data.forEach(function (row){

operacion += '<option value="'+row.id+'">'+row.Nombre+'</option>';

$('.operacion').html(operacion);


});

});

/*Fin Carga de Operaciones */


/*Inicio Carga de Contratos*/
$('.contrato').selectize({
maxItems: 1,
valueField: 'Nombre',
labelField: 'Nombre',
searchField: 'Nombre',
options: [],
create: false,
load: function(query, callback) {
if (!query.length) return callback();

$.ajax({
url: 'sources/operacion.php?op=2',
type: 'GET',
dataType: 'json',
data: {
name: query,'tipo':'contrato'
},
error: function() {
callback();
},
success: function(res) {
callback(res);
}
});

}

});

/*Fin Carga de Contratos */

/*Inicio Cargar Clientes*/
$('.comercial').selectize({
maxItems: 1,
valueField: 'Nombre',
labelField: 'Nombre',
searchField: 'Nombre',
options: [],
create: false,
load: function(query, callback) {
if (!query.length) return callback();

$.ajax({
url: 'sources/operacion.php?op=2',
type: 'GET',
dataType: 'json',
data: {
name: query,'tipo':'vendedor'
},
error: function() {
callback();
},
success: function(res) {
callback(res);
}
});

}

});

/*Fin Cargar Clientes */

/*Inicio Carga de Formas de Pago*/
forma_pago = '<option value="">(Sin Asignar)</option>';
$.getJSON('sources/operacion.php?op=2',{'tipo':'forma_pago'},function(data){

data.forEach(function (row){

forma_pago += '<option value="'+row.id+'">'+row.Nombre+'</option>';

$('.forma_pago').html(forma_pago);


});

});

/*Fin Carga de Formas de Pago */


//Cargar Modal Nuevo Cliente
$(document).on('click','.btn-nuevo-cliente',function (e){

$('#nuevo-cliente')[0].reset();
 e.stopImmediatePropagation();

 $('#modal-nuevo-cliente').modal('show');

});


//Agregar Nuevo Cliente
$(document).on('submit','#nuevo-cliente',function (e){

 e.stopImmediatePropagation();

parametros =  $(this).serialize();


$.ajax({

url:"sources/operacion.php?op=3",
type:"POST",
data:parametros,
dataType:"JSON",
beforeSend:function(){

swal({
  title: "Cargando",
  imageUrl:"assets/img/loader2.gif",
  text:  "Espere un momento, no cierre la ventana.",
  timer: 3000,
  showConfirmButton: false
});


},
success:function(data){


swal({
  title: data.title,
  text:  data.text,
  type:  data.type,
  timer: 3000,
  showConfirmButton: false
});



}



});



e.preventDefault();
});


//Buscar Cliente
$(document).on('click','.btn-buscar-cliente',function(e){

 e.stopImmediatePropagation();



 numero_cliente = $('.numero_cliente').val();
 tipo_doc       = $('.tipo_doc').val();


  if(tipo_doc=='')
  {

  swal({
  title: "Ingrese el tipo de documento",
  text:  "",
  type:  "warning",
  timer: 1000,
  showConfirmButton: false
});

return false
  }


    if(numero_cliente=='')
  {

  swal({
  title: "Ingrese el número",
  text:  "",
  type:  "warning",
  timer: 1000,
  showConfirmButton: false
});

return false
  }


//Envío por ajax
$.ajax({

url:"sources/operacion.php?op=4",
type:"POST",
dataType:"JSON",
data:{'numero':numero_cliente,'tipo':tipo_doc},
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


if(data['success']==true)
{

$('.nombres').val('');
$('.documento').val('');
$('.condicion').val('');

$('.nombres').val(data['result']['razon_social']);
$('.documento').val(data['result']['ruc']);
$('.condicion').val(data['result']['condicion']);


swal({
title: "",
text:  "Registro encontrado",
type:  "success",
timer: 1000,
showConfirmButton: false
});


}
else
{

$('.nombres').val('');
$('.documento').val('');
$('.condicion').val('');

swal({
title: "",
text:  "No se encontraron resultados",
type:  "info",
timer: 1000,
showConfirmButton: false
});


}


}


});



});



function loadIMEI(modelo)
{

 $(document).ready(function (){

var oTable =  $('#consulta_imei').dataTable({

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
"sAjaxSource": "sources/operacion.php?op=5",
"fnServerParams": function ( aoData ) {
aoData.push( 

  { "name":"modelo", "value": modelo }


  );
},
"aoColumns": [

{ mData: 'PuntoVenta'},
{ mData: 'Modelo'},
{ mData: null,render:function(data){

imei = '<span data-imei="'+data.IMEI+'" class="click-imei">'+data.IMEI+'</span>';

return imei;

} ,className:"text-primary text-center"},
{ mData: 'Tipo'},
{ mData: 'dias'}
]

});




 });

}



//Capturar elemento seleccionado
$('select.modelo').on('change',function(e){

e.stopImmediatePropagation();

var valor = $(this).val();

if(valor!=='')
{

$('.imei').val('');
 loadIMEI(valor);
$('#modal-imei').modal('show');


}

});


//Click IMEI
$(document).on('click','.click-imei',function(e){

 e.stopImmediatePropagation();

 imei = $(this).data('imei');

$('.imei').val(imei);
$('#modal-imei').modal('hide');


});


//Capturar Operación seleccionada (código biometrico, código TM)
$('select.operacion').on('change',function(e){

;

var valor = $(this).val();

if(valor!=='')
{

$.getJSON('sources/operacion.php?op=2',{'id':valor,'tipo':'datos_adicionales'},function(data){

if(data.datos_adicionales==1)
{

$('.codigo_biometrico').hide();
$('.label_codigo_biometrico').hide();
$('.label_codigo_tm').hide();
$('.codigo_tm').hide();
$('.codigo_biometrico').show();
$('.label_codigo_biometrico').show();

}
else if (data.datos_adicionales==2)
{

$('.codigo_biometrico').hide();
$('.label_codigo_biometrico').hide();
$('.label_codigo_tm').hide();
$('.codigo_tm').hide();
$('.codigo_biometrico').show();
$('.label_codigo_biometrico').show();
$('.codigo_tm').show();
$('.label_codigo_tm').show();


}
else
{

$('.codigo_biometrico').hide();
$('.label_codigo_biometrico').hide();
$('.label_codigo_tm').hide();
$('.codigo_tm').hide();



}


});


}

});


//Agregar Operación
$(document).on('submit','#agregar',function(e){

e.stopImmediatePropagation();

parametros  = $(this).serialize();

$.ajax({

url:"sources/operacion.php?op=6",
type:"POST",
data:parametros,
dataType:"JSON",
beforeSend:function(){

swal({
  title: "Cargando",
  imageUrl:"assets/img/loader2.gif",
  text:  "Espere un momento, no cierre la ventana.",
  timer: 3000,
  showConfirmButton: false
});


},
success:function(data){

$('#agregar')[0].reset();

swal({
  title: data.title,
  text:  data.text,
  type:  data.type,
  timer: 3000,
  showConfirmButton: false
});


}


});



e.preventDefault();
});



</script>

