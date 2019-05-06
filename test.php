<?php 

//include'vendor/autoload.php';


try {

include'vendor/jossmp/sunatphp/src/autoload.php';
$company = new \Sunat\Sunat( true, true );

	$numero = "10467942820";
	
	$ruc = ( isset($numero))? $numero : false;
	$search1 = $company->search( $ruc );
	
	echo $search1->json();

	
} catch (Exception $e) {

echo "Error: ".$e->getMessage();

	
 }




 ?>


