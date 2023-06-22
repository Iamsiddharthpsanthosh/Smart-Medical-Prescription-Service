<?php


$drugs = $_POST['drugs'];
$details = $_POST['details'];
$patientid = $_POST['patientid'];


//Database connection for smps sign up;
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "test");

$connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
if($connect==false){
	echo("connection failed");

}else{

	if($stmt = $connect->prepare("INSERT INTO dprescription(patientid, drugs, details)values(?, ?, ?)"))
	{
	$stmt->bind_param("iss",$patientid, $drugs, $details);
	$stmt->execute();
	
	header('Location:third.html');
	
	$stmt->close();

	}
	else{
	echo"poda";
	}


	$connect->close();

	}

?>
