<?php
$position=$_GET['position'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sdpi";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM `sample` WHERE `sample`.`id` = $position";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully !";
    ?>
    <a href="2_display.php">Go Back<a>
<?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

 ?>
