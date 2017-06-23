<?php
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$course=$_POST['course'];
$email=$_POST['email'];
$img="upload/";
$img=$img.basename($_FILES['image']['name']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sdpi";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `sample` (`id`, `firstname`, `lastname`, `course`, `email`, `image`) VALUES (NULL, '$fname', '$lname', '$course', '$email' , '$img')";

if (mysqli_query($conn, $sql) && (move_uploaded_file($_FILES['image']['tmp_name'],$img))) {
    echo "New record created successfully !";
    ?>
    <a href="2_display.php">Go Back<a>
<?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
