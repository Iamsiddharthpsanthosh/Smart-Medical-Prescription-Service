<?php
$stmt_result = null; // Declare the variable outside the if statement

if (isset($_POST["patientid"])) {
    $patientid = $_POST["patientid"];

    // Connection to the database
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "test");

    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

    if (!$connect) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $stmt = $connect->prepare("SELECT * FROM report WHERE patientid = ?");
    $stmt->bind_param("i", $patientid);

    if (!$stmt->execute()) {
        die("Query execution failed: " . $stmt->error);
    }

    $stmt_result = $stmt->get_result();

    if ($stmt_result !== null) {
        if ($stmt_result->num_rows > 0) {
            $row = $stmt_result->fetch_assoc(); // Fetch the first row to get the column headings
?>
<h1>Registered patients informtion</h1>

            <table>
                <tr>
                    <?php foreach ($row as $heading => $value) { ?>
                        <th><?php echo $heading; ?></th>
                    <?php } ?>
                </tr>
                <tr>
                    <?php foreach ($row as $value) { ?>
                        <td><?php echo $value; ?></td>
                    <?php } ?>
                </tr>
            </table>
            <?php
        } else {
            echo "No records found.";
        }
    } else {
        die("Result set is null. Possible error in the SQL query.");
    }
} else {
    die("Patient ID not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>GFG User Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
html {
  font-size: 10px; /* px means "pixels": the base font size is now 10 pixels high */
  font-family: "Open Sans", sans-serif; /* this should be the rest of the output you got from Google Fonts */
  background-color:#92ed99;
}



        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1{
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
h3{
text-align: center;


}
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }

textarea{
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            display:block;
            margin:0 auto;


}
input{
 display:block;
            margin:0 auto;



}


    </style>
</head>

 <body>



	</body>




