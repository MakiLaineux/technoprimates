<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
	/* 	
	display tb_proof on screen
	*/

	// bdd access parameters :
	$SERVER = "localhost";	
	$USER = "root"; 
	$PWD = "mysqlroot2017";
	$JCBDD = "proof";
	$JCTABLE = "tbrequest";

	// Open BDD:
	$mysqli = new mysqli($SERVER, $USER, $PWD, $JCBDD);
	if ($mysqli->connect_error) {
		printf("MySQL connexion error : %s\n", $mysqli->error);
		exit;
		}

	// Resquest db :
	$request = "SELECT * FROM $JCTABLE;";
	$result = $mysqli->query($request);
	if (!$result) {
		printf("MySQL request error : %s\n",$mysqli->error);
		exit;
		}
	
	//Affichage du r?sultat:
	printf("Select * From %s :<br>", $JCTABLE);
	print ("<TABLE BORDER> <TR>
		<TH>Id</TH> <TH>Instance</TH> <TH>Request</TH> <TH>hash</TH> <TH>tree</TH> <TH>TxId</TH> <TH>info</TH> <TH>status</TH> </TR>");	
	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		print ("<TR>");
		print ("<TD>".$row['id']."</TD>");
		print ("<TD>".$row['instance']."</TD>");
		print ("<TD>".$row['request']."</TD>");
		print ("<TD>".$row['hash']."</TD>");
		print ("<TD>".$row['tree']."</TD>");
		print ("<TD>".$row['txid']."</TD>");
		print ("<TD>".$row['info']."</TD>");
		print ("<TD>".$row['status']."</TD>");
		print ("</TR>");
	}
	print ("</TABLE>");	
	
    $result->close();
	$mysqli->close();

   ?>
