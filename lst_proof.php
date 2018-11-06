<?php
	$SERVER = "localhost";	
	$USER = "jcharbonnel"; 
	$PWD = "jcharbonnel";
	$JCBDD = "jcharbonnel";
	$JCTABLE = "tbrequest";

        $instance = $_GET['instance']; 

	//$request = "SELECT * FROM $JCTABLE WHERE instance='$instance';"; 
	$request = "SELECT * FROM $JCTABLE;"; 

	// Ouverture BDD:
	$mysqli = new mysqli($SERVER, $USER, $PWD, $JCBDD);
	if ($mysqli->connect_error) exit(100);
	
	// Execution de la requete :
	if (!$result = $mysqli->query($request)) exit(101);

    // Premiere ligne de la reponse : date et nombre d'enregistrements trouves 
    $row['DateSynchro']= date("YmdHis");
    $row['NbEnr']= $result->num_rows;
    $output[]=$row;

    // Lignes suivantes:
	// Transfert du résultat dans un tableau associatif 
	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$output[]=$row;   
		}

	if (empty($output)) exit(102);
        $result->close();
	$mysqli->close();

	// envoi du résultat encodé en JSON
	print(json_encode($output));
 ?>
