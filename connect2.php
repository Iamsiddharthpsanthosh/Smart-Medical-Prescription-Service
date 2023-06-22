<?php

$firstName = $_POST["firstName"];
$password = $_POST["password"];

//connection to database
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "test");


$connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
if($connect==true){
  $stmt=$connect->prepare("SELECT* FROM sign_up where firstName = ?");
  $stmt->bind_param("s", $firstName);
	$stmt->execute();
	$stmt_result = $stmt->get_result();

	 if($stmt_result==true ){
		 
		 $data = $stmt_result->fetch_assoc();
		 
	        
		 if($data["password"] === $password){
			header('Location:third.html');
		  
		  }else{
		
			  echo"<h1 style='text-align : center'>Incorrect name or password!!</h1>";
		  
		  }
	 
	 }

	
}else{
	echo"poda";

}
?>
