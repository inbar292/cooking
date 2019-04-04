<?php

// You can access the values posted by jQuery.ajax
// through the global variable $_POST, like this:

//connection
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "cooking";

// $q = $_POST['name'];

$q = $_REQUEST['q'];


$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if (!$con) {
    die('Could not connect: ' . $conn->connect_error);
}

mysqli_select_db($con,$dbname);
$sql="SELECT * FROM ".$q;
$result = mysqli_query($con,$sql);

if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)) {
  $outputData[] = $row;

}
echo json_encode($outputData);
}
$con->close();
?>
