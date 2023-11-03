<?php


$firstName = $_POST['firstName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$number = $_POST['number'];


//Database connection for smps sign up;
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "test");

$connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
if($connect==false){
	echo("connection failed");

}else{

	if($stmt = $connect->prepare("INSERT INTO registernewpatient(name, gender, email, number)values(?, ?, ?, ?)"))
	{
	$stmt->bind_param("sssi",$firstName, $gender, $email, $number);
	$stmt->execute();
	
	echo"<a href='patient_register.html' style ='text-align:center'>click to go back</a>";
	
	$stmt->close();

	}
	else{
	echo"poda";
	}


	$connect->close();

	}

?>
