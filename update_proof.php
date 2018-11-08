<?php
	$SERVER = "localhost";	
	$USER = "jcharbonnel"; 
	$PWD = "jcharbonnel";
	$JCBDD = "jcharbonnel";
	$JCTABLE = "tbrequest";

	$idrequest = $_GET['idrequest'];
	$chain = $_GET['chain'];
	$tree = $_GET['tree'];
	$info = $_GET['info'];
	$txid = $_GET['txid'];

	$request = "UPDATE $JCTABLE SET status='4', chain='$chain', tree='$tree', txid='$txid', info='$info' WHERE id='$idrequest';";

	// Ouverture BDD:
	$mysqli = new mysqli($SERVER, $USER, $PWD, $JCBDD);
	if ($mysqli->connect_error) exit(100);

	// Execution de la requete :
	if (!$result = $mysqli->query($request)) exit(101);
		if ($mysqli->error) {
		printf("MySQL connexion error : %s\n", $mysqli->error);
		exit;
		}

	// Requete select
	$request = "SELECT * FROM $JCTABLE WHERE id='$idrequest';";

	
	if (!$result = $mysqli->query($request)) exit(102);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$output[]=$row;	

	// resultat
	print(json_encode($output));
	$mysqli->close();

 ?>
 
