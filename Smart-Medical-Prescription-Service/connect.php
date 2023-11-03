<?php


$firstName = $_POST['firstName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
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

	if($stmt = $connect->prepare("INSERT INTO sign_up(firstName, gender, email, password, number)values(?, ?, ?, ?, ?)"))
	{
	$stmt->bind_param("ssssi",$firstName, $gender, $email, $password, $number);
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
