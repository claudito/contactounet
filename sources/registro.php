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


if(empty($_REQUEST['fechaini']))
{

$fechaini = $funciones->first_day(date('Y-m-d'));
$fechafin = $funciones->last_day(date('Y-m-d'));

}
else
{

$fechaini = trim($_REQUEST['fechaini']);
$fechafin = trim($_REQUEST['fechafin']);

}

$query =  "
SELECT 
o.id,
DATE_FORMAT(o.Fecha,'%d/%m/%Y')Fecha,
o.Operacion,
o.Promocion,
o.Contrato,
o.Modelo,
o.idModelo,
o.IMEI,
o.Telefono,
o.PVP,
o.Codigo,
o.Nombre,
o.NIF,
o.Puntos,
o.Observaciones,
o.idUsuario,
o.Usuario,
o.idCliente,
c.Nombre Cliente,
o.ZonaAzul,
o.idPuntoVenta,
o.PuntoVenta,
o.NumFactura,
o.Servicio,
o.idFormaPago,
o.FormaPago,
o.NumAbono,
o.ICC,
o.CodPromocion,
o.IMEIAccesorio1,
o.NombreAccesorio1,
o.CodigoFija,
o.FechaAbono,
o.FechaFactura,
o.Boletin,
o.FechaActivacion,
o.Estado,
o.idSegmento,
o.NombreSegmento,
o.OperadorDonante,
o.TamañoPrevisto,
o.NombreComercial,
o.idComercial,
o.Compromiso,
CAST(o.Pagar AS DECIMAL(8,2))Pagar,
o.userCreate

FROM operaciones o
LEFT JOIN clientes c ON o.idCliente=c.id

WHERE DATE_FORMAT(o.Fecha,'%Y-%m-%d') BETWEEN :fechaini AND :fechafin";
$statement = $conexion->prepare($query);
$statement->bindParam(':fechaini',$fechaini);
$statement->bindParam(':fechafin',$fechafin);
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


echo json_encode(

array(

'fechaini' => $funciones->first_day(date('Y-m-d')),
'fechafin' => $funciones->last_day(date('Y-m-d'))

)


);


break;
	
	default:
	echo "opción no disponible";
		break;
}



 ?>