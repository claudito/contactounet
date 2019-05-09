<?php 

include'../vendor/autoload.php';
include'../autoload.php';

$session =  new Session();
$session->validity();

$opcion     = $_REQUEST['op'];
$funciones  = new Funciones();

$conexion   =  new Conexion();
$conexion   =  $conexion->get_conexion();

$userCreate = $_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.APELLIDOS];
$dateCreate = date('Y-m-d H:i:s');

switch ($opcion) {
case 1:
header("Content-type: application/json; charset=utf-8");

$query =  "
SELECT id, Fecha, Operacion, Promocion, Contrato, Modelo, idModelo, IMEI, Telefono, PVP, Codigo, Nombre, NIF, Puntos, Observaciones, idUsuario, Usuario, idCliente, Cliente, ZonaAzul, idPuntoVenta, PuntoVenta, NumFactura, Servicio, idFormaPago, FormaPago, NumAbono, ICC, CodPromocion, IMEIAccesorio1, NombreAccesorio1, CodigoFija, FechaAbono, FechaFactura, Boletin, FechaActivacion, Estado, idSegmento, NombreSegmento, OperadorDonante, TamañoPrevisto, NombreComercial, idComercial, Compromiso FROM operaciones 

";
$statement = $conexion->query($query);
$statement->execute();
$result      = $statement->fetchAll(PDO::FETCH_ASSOC);


$results = ["sEcho" => 1,
          "iTotalRecords" => count($result),
          "iTotalDisplayRecords" => count($result),
          "aaData" => $result 
           ];
echo json_encode($results);


break;


case  2:




try {
	

switch ($_REQUEST['tipo']) {
	case 'clientes':
	$name =  trim($_REQUEST['name']);
	
    $query  =  "SELECT  id, Nombre, Contacto, Direccion, Poblacion, CP, Provincia, CIF, Telefono, Fax, Email, NombreCorto, CuentaBanco, Creado, txtCategoria, CodigoCliente, idFPago, FPago, Segmento, TipoDocumento, Nacionalidad ,

CONCAT(UPPER(Nombre),' - ',CIF) name

FROM clientes WHERE CONCAT(Nombre,CIF) LIKE '%".$name."%'";
$result  = $funciones->query($query);

echo json_encode($result);

		break;

    case 'estado':

$query  =  "SELECT id, Nombre FROM estadosoperaciones";
$result  = $funciones->query($query);

echo json_encode($result);

    break;


    case  'modelo':

    //$name =  trim($_REQUEST['name']);

$query  =  "SELECT  Modelo,NombrePuntoVenta,Stock,Modelo Nombre FROM  (
SELECT  Modelo,NombrePuntoVenta,count(IMEI)Stock FROM detallecompras 
GROUP BY Modelo,NombrePuntoVenta  ) s  WHERE NombrePuntoVenta ='SAN JUAN 1176'";
$result  = $funciones->query($query);

echo json_encode($result);


    break;



    case  'accesorio':

   // $name =  trim($_REQUEST['name']);

$query  =  "SELECT id, Descripcion Nombre FROM articulos WHERE NombreFamilia='ACCESORIOS'";
$result  = $funciones->query($query);

echo json_encode($result);


    break;

       case  'operacion':

$query  =  "SELECT id, Nombre FROM tipooperacion";
$result  = $funciones->query($query);

echo json_encode($result);


    break;


        case  'contrato':

      //$name =  trim($_REQUEST['name']);

$query  =  "SELECT id, Nombre FROM contrato";
$result  = $funciones->query($query);

echo json_encode($result);


    break;


    case  'datos_adicionales':

    $id     = $_REQUEST['id'];
    
    $query  =  "SELECT  * FROM tipooperacion WHERE id=".$id;
    $result =  $funciones->query($query)[0];

    echo json_encode($result);

    break;


      case  'vendedor':

     // $name =  trim($_REQUEST['name']);

$query  =  "SELECT id, Nombre FROM usuarios";
$result  = $funciones->query($query);

echo json_encode($result);


    break;

      case  'forma_pago':

$query  = " SELECT id, Nombre, Codigo, EsEfectivo, EsPagado, idSerie FROM formaspago";
$result  = $funciones->query($query);

echo json_encode($result);

    break;
	
	default:
echo "opcion no disponible";
		break;
}



} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}


break;


case  3:


$nombres      =  $funciones->validar_xss($_REQUEST['nombres']);
$apellidos    =  $funciones->validar_xss($_REQUEST['apellidos']);
$tipo_doc     =  $funciones->validar_xss($_REQUEST['tipo_doc']);
$cif          =  $funciones->validar_xss($_REQUEST['documento']);
$nombre       =  $nombres.' '.$apellidos;
$direccion    =  $funciones->validar_xss($_REQUEST['direccion']);

try {


$query     =  "SELECT  * FROM clientes WHERE CIF=:cif";
$statement =  $conexion->prepare($query);
$statement->bindParam(':cif',$cif);
$statement->execute();
$result    = $statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)>0)
{

$funciones->message("Código Duplicado","El Cliente ya esta Registrado","warning");

}
else
{

$query = "INSERT INTO clientes(Nombre,CIF,TipoDocumento,Nombres,Apellidos,Direccion)VALUES
(:nombre,:cif,:tipo_doc,:nombres,:apellidos,:direccion)";
$statement = $conexion->prepare($query);
$statement->bindParam(':nombre',$nombre);
$statement->bindParam(':nombres',$nombres);
$statement->bindParam(':apellidos',$apellidos);
$statement->bindParam(':cif',$cif);
$statement->bindParam(':tipo_doc',$tipo_doc);
$statement->bindParam(':direccion',$direccion);
$statement->execute();

$funciones->message("Buen Trabajo","Cliente Agregado","success");

	
}

	
} catch (Exception $e) {

$funciones->message("Error",$e->getMessage(),"error");

	
}

break;



case  4:

$numero  =  trim($_REQUEST['numero']);
$tipo    =  trim($_REQUEST['tipo']);

try {

error_reporting(0);

if($tipo=='RUC')
{

include'../vendor/jossmp/sunatphp/src/autoload.php';
$company = new \Sunat\Sunat( true, true );

$ruc     = ( isset($numero))? $numero : false;
$search  = $company->search( $ruc );

echo json_encode($search);

}
else
{

include'../vendor/jossmp/datos-peru/src/autoload.php';

$reniec = new \reniec\reniec();

$search = $reniec->search( $numero );

echo json_encode($search);


}
	
} catch (Exception $e) {

echo "Error: ".$e->getMessage();

	
 }


break;

case  5:

$modelo = trim($_REQUEST['modelo']);
$now    = date('Y-m-d');

try {

$query =  "
SELECT 

c.Factura,
c.FechaFactura,
c.PuntoVenta,
d.Modelo,
d.IMEI,
d.Tipo,
d.NombrePuntoVenta,
DATEDIFF(:now, DATE_FORMAT(c.fechaFactura,'%Y-%m-%d')) dias

FROM compras  c  

INNER JOIN detallecompras d  ON c.Factura=d.Factura  WHERE 
PuntoVenta='TEX SAN JUAN 1176' AND
d.Modelo =  :modelo";
$statement = $conexion->prepare($query);
$statement->bindParam(':modelo',$modelo);
$statement->bindParam(':now',$now);
$statement->execute();
$result      = $statement->fetchAll(PDO::FETCH_ASSOC);

$results = ["sEcho" => 1,
          "iTotalRecords" => count($result),
          "iTotalDisplayRecords" => count($result),
          "aaData" => $result 
           ];
echo json_encode($results);


	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

break;

case 6:

$fecha              =  $_REQUEST['fecha'];
$estado             =  $_REQUEST['estado'];
$cliente            =  $_REQUEST['cliente'];
$idorder            =  $_REQUEST['id_order'];
$orderaction        =  $_REQUEST['order_action'];
$modelo             =  $_REQUEST['modelo'];
$imei               =  $_REQUEST['imei'];
$operacion          =  $_REQUEST['operacion'];
$codigobiometrico   =  $_REQUEST['codigo_biometrico'];
$codigotm           =  $_REQUEST['codigo_tm'];
$comercial          =  $_REQUEST['comercial'];
$contrato           =  $_REQUEST['contrato'];
$telefono           =  $_REQUEST['telefono'];
$pago               =  $_REQUEST['pago'];
$formapago          =  $_REQUEST['forma_pago'];
$observacion        =  $_REQUEST['observacion'];


try {
  
$query =  "INSERT INTO operaciones
(Fecha,Estado,idCliente,idOrder,orderActionId,Modelo,IMEI,Operacion,codigoBiometrico,codigoTM,NombreComercial,Contrato,Telefono,Pagar,idFormaPago,Observaciones)
VALUES
(:fecha,:estado,:cliente,:idorder,:orderaction,:modelo,:imei,:operacion,:codigobiometrico,:codigotm,:comercial,:contrato,:telefono,:pago,:formapago,:observacion)
";
$statement = $conexion->prepare($query);
$statement->bindParam(':fecha',$fecha);
$statement->bindParam(':estado',$estado);
$statement->bindParam(':cliente',$cliente);
$statement->bindParam(':idorder',$idorder);
$statement->bindParam(':orderaction',$orderaction);
$statement->bindParam(':modelo',$modelo);
$statement->bindParam(':imei',$imei);
$statement->bindParam(':operacion',$operacion);
$statement->bindParam(':codigobiometrico',$codigobiometrico);
$statement->bindParam(':codigotm',$codigotm);
$statement->bindParam(':comercial',$comercial);
$statement->bindParam(':contrato',$contrato);
$statement->bindParam(':telefono',$telefono);
$statement->bindParam(':pago',$pago);
$statement->bindParam(':formapago',$formapago);
$statement->bindParam(':observacion',$observacion);
$statement->execute();


echo json_encode(

array(

"title" => "Buen Trabajo",
"text"  => "Operación Registrada",
"type"  => "success"

)

);


} catch (Exception $e) {
  
echo json_encode(

array(

"title" => "Error",
"text"  => $e->getMessage(),
"type"  => "error"

)

);



}

break;

default:
echo "opción no disponible";
break;
}




 ?>