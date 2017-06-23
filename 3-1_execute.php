<?php

$sql=$_POST['query'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sdpi";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql)) {
    echo "Query executed successfully !";
    ?>
    <a href="3_custom_query.html">Go Back<a>
<?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
