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
$archivo   = $_FILES['archivo']['name'];
$tipo      = $_FILES['archivo']['type'];
$destino   = "bak_" . $archivo;

if (copy($_FILES['archivo']['tmp_name'], $destino))
{
echo "Archivo Cargado Con Éxito";

//Asignación de Permiso Archivo
chmod($destino, 0777);

}
else
{
echo "Error Al Cargar el Archivo";
}
if (file_exists("bak_" . $archivo)) 
{
// Cargando la hoja de cálculo
$objReader = new PHPExcel_Reader_Excel2007();
//$objPHPExcel = $objReader->load("bak_" . $archivo);
$objPHPExcel = $objReader->load($destino);
$objFecha = new PHPExcel_Shared_Date();
// Asignar hoja de excel activa
$objPHPExcel->setActiveSheetIndex(0);

// Llenamos el arreglo con los datos  del archivo xlsx
for ($i = 3; $i <= $fila; $i++)
{
$_DATOS_EXCEL[$i]['a']    = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['b'] = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['c'] = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['d'] = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['e'] = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['f'] = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
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

var_dump($_DATOS_EXCEL);



unlink($destino);




		break;
	
	default:
	
    echo "opción no disponible";

		break;
}


try {



	
} catch (Exception $e) {
	
echo "Eror: ".$e->getMessage();

}




 ?>