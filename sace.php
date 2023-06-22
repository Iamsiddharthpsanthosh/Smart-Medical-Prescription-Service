<?php

// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create a new connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}




$connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
if($connect==false){
	echo("connection failed");


// Retrieve the table data sent from the client-side
$tableData = $_POST['tableData'];

// Prepare the SQL statement for inserting data
$sql = "INSERT INTO your_table_name (name, email, phone, address, city, country) VALUES (?, ?, ?, ?, ?, ?)";

// Prepare the statement
$stmt = $connection->prepare($sql);

// Bind the parameters
$stmt->bind_param("ssssss", $name, $email, $phone, $address, $city, $country);

// Insert each row of data into the database
foreach ($tableData as $row) {
    $name = $row[0];
    $email = $row[1];
    $phone = $row[2];
    $address = $row[3];
    $city = $row[4];
    $country = $row[5];

    // Execute the statement
    $stmt->execute();
}

// Close the statement
$stmt->close();

// Close the connection
$connection->close();

?>

