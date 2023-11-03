<?php
// Connection to the database
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "test");

$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

$stmt = $connect->prepare("SELECT * FROM registernewpatient");
$stmt->execute();
$stmt_result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Patients Information</title>
    <style>
        html {
            font-size: 10px;
            font-family: "Open Sans", sans-serif;
            background-color: #ffcccc;
        }
        
        h1 {
            text-align: center;
            color: #cc0000;
            font-size: 32px;
            margin-top: 20px;
        }
        
        table {
            margin: 0 auto;
            width: 80%;
            border-collapse: collapse;
            border: 1px solid #cc0000;
            margin-top: 20px;
        }
        
        th, td {
            padding: 10px;
            border: 1px solid #cc0000;
        }
        
        th {
            background-color: #ff9999;
            color: white;
            font-weight: bold;
            font-size: 14px;
        }
        
        td {
            background-color: #ffe6e6;
            color: #cc0000;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h1>Registered Patients Information</h1>
    <table>
        <tr>
            <th>Patient ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Number</th>
        </tr>
        <?php while ($rows = $stmt_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $rows['patientid']; ?></td>
                <td><?php echo $rows['name']; ?></td>
                <td><?php echo $rows['gender']; ?></td>
                <td><?php echo $rows['email']; ?></td>
                <td><?php echo $rows['number']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

