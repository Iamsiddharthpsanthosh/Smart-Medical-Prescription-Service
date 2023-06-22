
<?php
$patientid = $_POST['patientid'];
$report = $_FILES['report']['tmp_name']; // Assuming the 'report' field is an uploaded file

// Database connection for smps sign up
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "test");

$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if ($connect == false) {
    echo("Connection failed");
} else {
    if ($stmt = $connect->prepare("INSERT INTO report (patientid, report) VALUES (?, ?)")) {
        $stmt->bind_param("ss", $patientid, $reportData);

        // Read the image file and store its contents in a variable
        $reportData = file_get_contents($report);

        $stmt->send_long_data(1, $reportData); // Bind the image data as a BLOB

        if ($stmt->execute()) {
            header('Location: diagonostic_center.html');
            exit();
        } else {
            echo "Error executing the statement: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing the statement: " . $connect->error;
    }

    $connect->close();
}
?>
