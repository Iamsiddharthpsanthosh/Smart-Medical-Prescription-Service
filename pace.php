<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$tablename = "pharmacy";

// Create a new connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

// Fetch the data from the database
$sql = "SELECT * FROM $tablename";
$result = $connection->query($sql);
?>

<!-- HTML table -->
<table id="editableTable">
  <tr>
    <th>Drugs</th>
    <th>Price</th>
    <th>Pharmacy</th>
    <th>Stock</th>
    <th>Details</th>
    <th>Action</th>
  </tr>

  <?php
  // Loop through the database results and populate the table rows
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td contenteditable='true'>" . $row['Drugs'] . "</td>";
      echo "<td contenteditable='true'>" . $row['Price'] . "</td>";
      echo "<td contenteditable='true'>" . $row['Pharmacy'] . "</td>";
      echo "<td contenteditable='true'>" . $row['Stock'] . "</td>";
      echo "<td contenteditable='true'>" . $row['Details'] . "</td>";
      echo "<td><button onclick='saveRow(this)'>Save</button></td>";
      echo "</tr>";
    }
  }
  ?>

</table>

<?php
// Close the connection
$connection->close();
?>
