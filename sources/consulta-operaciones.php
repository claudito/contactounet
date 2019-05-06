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
SELECT 
o.id,
DATE_FORMAT(o.Fecha,'%d/%m/%Y')Fecha,
t.Nombre Operacion,
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
fp.Nombre FormaPago,
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
o.idOrder,
o.orderActionId,
o.codigoBiometrico,
o.codigoTM,
CAST(o.Pagar AS decimal(8,2))Pagar
FROM operaciones o 

INNER JOIN tipooperacion t ON o.Operacion=t.id

INNER JOIN clientes c ON o.idCliente=c.id

INNER JOIN formaspago fp ON o.idFormaPago=fp.id


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




default:
echo "opción no disponible";
break;
}




 ?>