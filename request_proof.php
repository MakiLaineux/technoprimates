<?php
	$SERVER = "localhost";	
	$USER = "jcharbonnel"; 
	$PWD = "jcharbonnel";
	$JCBDD = "jcharbonnel";
	$JCTABLE = "tbrequest";

	$instance = $_GET['instance'];
	$idrequest = $_GET['idrequest'];
	$hash = $_GET['hash'];
	
	$request = "INSERT INTO $JCTABLE (`id`, `instance`, `request`, `hash`, `tree`, `chain`, `txid`, `info`, `status`) 
              VALUES (NULL, $instance, $idrequest, $hash, '', 'btc-testnet', '', '', '2');";
 
	// Ouverture BDD:
	$mysqli = new mysqli($SERVER, $USER, $PWD, $JCBDD);
	if ($mysqli->connect_error) exit(100);

	// Execution de la requete :
	if (!$result = $mysqli->query($request)) exit(101);
	$last = $mysqli->insert_id;	

	// Requete select
	$request = "SELECT * FROM $JCTABLE WHERE id=$last;";
	if (!$result = $mysqli->query($request)) exit(102);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$output[]=$row;	

	// resultat
	print(json_encode($output));
	$mysqli->close();

 ?>
