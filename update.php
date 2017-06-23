<?php
$id=$_POST['id'];
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$course=$_POST['course'];
$email=$_POST['email'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sdpi";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE `sample` SET `firstname` = '$fname', `lastname` = '$lname', `course` = '$course', `email` = '$email' WHERE `sample`.`id` = '$id' ";

if (mysqli_query($conn, $sql)) {
    echo "Record is Updated";
    ?>
    <a href="display.php">Back<a>
<?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
