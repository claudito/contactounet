<?php 

include'../autoload.php';
include'../vendor/autoload.php';

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

$fila        =  $_REQUEST['fila'];
$fecha_carga =  $_REQUEST['fecha_carga'];

//cargamos el archivo al servidor con el mismo nombre
//solo le agregue el sufijo bak_ 
$archivo     = $_FILES['archivo']['name'];
$tipo        = $_FILES['archivo']['type'];
$destino     = "bak_" . $archivo;

$msg         =  array();


if (copy($_FILES['archivo']['tmp_name'], $destino))
{
//echo "Archivo Cargado Con Éxito";
array_push($msg, "Archivo Cargado Con Éxito");

//Asignación de Permiso Archivo
chmod($destino, 0777);

}
else
{
echo "Error Al Cargar el Archivo";
}
if (file_exists("bak_" . $archivo)) 
{

try {

// Cargando la hoja de cálculo
$objReader = new PHPExcel_Reader_Excel2007();
//$objPHPExcel = $objReader->load("bak_" . $archivo);
$objPHPExcel = $objReader->load($destino);
$objFecha = new PHPExcel_Shared_Date();
// Asignar hoja de excel activa
$objPHPExcel->setActiveSheetIndex(0);

// Llenamos el arreglo con los datos  del archivo xlsx
for ($i = 5; $i <= $fila; $i++)
{

$_DATOS_EXCEL[$i]['a']  = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['b'] = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['c'] = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['d'] = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['e'] = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['f'] = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();

}

} catch (Exception $e) {

echo "Error: ".$e->getMessage();	

}	


}
//si por algo no cargo el archivo bak_ 
else 
{
echo "Necesitas primero importar el archivo";
}
$errores = 0;
//recorremos el arreglo multidimensional 
//para ir recuperando los datos obtenidos
//del excel e ir insertandolos en la BD
try {

foreach ($_DATOS_EXCEL as $key => $value) {

$b = trim($value['b']);
$c = trim($value['c']);
$d = trim($value['d']);
$e = trim($value['e']);
$f = trim($value['f']);


$query  =  "INSERT INTO cam_prepago
(categoria,modelos,alta_y_caeq_pre2,portabilidad_y_caeq_pre3,caeq_pre1,fecha_carga,dateCreate) 
VALUES
(:b,:c,:d,:e,:f,:fecha_carga,:dateCreate)";
$statement = $conexion->prepare($query);
$statement->bindParam(':b',$b);
$statement->bindParam(':c',$c);
$statement->bindParam(':d',$d);
$statement->bindParam(':e',$e);
$statement->bindParam(':f',$f);
$statement->bindParam(':fecha_carga',$fecha_carga);
$statement->bindParam(':dateCreate',$dateCreate);
$statement->execute();
echo "ok";


}


} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}




//var_dump($msg);


unlink($destino);




		break;
	
	default:
	
    echo "opción no disponible";

		break;
}





 ?>

