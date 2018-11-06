<?php
	$SERVER = "localhost";	
	$USER = "jcharbonnel"; 
	$PWD = "jcharbonnel";
	$JCBDD = "jcharbonnel";
	$JCTABLE = "tbrequest";

	$instance = $_GET['instance'];
	$idrequest = $_GET['idrequest'];
	
	$request = "UPDATE $JCTABLE SET status='5' WHERE instance=$instance AND request=$idrequest;";
 
	// Ouverture BDD:
	$mysqli = new mysqli($SERVER, $USER, $PWD, $JCBDD);
	if ($mysqli->connect_error) exit(100);

	// Execution de la requete :
	if (!$result = $mysqli->query($request)) exit(101);

	// Requete select
	$request = "SELECT * FROM $JCTABLE WHERE instance=$instance AND request=$idrequest;";
	if (!$result = $mysqli->query($request)) exit(102);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$output[]=$row;	

	// resultat
	print(json_encode($output));
	$mysqli->close();

 ?>
 
