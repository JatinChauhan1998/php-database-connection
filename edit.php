<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sdpi";
$id=$_GET['position'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$selectSQL = "SELECT * FROM `sample` WHERE `sample`.`id`='$id'";

  if( !( $selectRes = mysqli_query( $conn , $selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
  }else{
    ?>
<form action="update.php" method="post">
<table border="1" align ="center">
  <thead>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Course</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="5">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
          echo "
                <tr>
                    <td>";?><input type="text" name="id" value="<?php echo"{$row['id']}" ?>"> <?php echo "</td>
                    <td>";?><input type="text" name="firstname" value="<?php echo"{$row['firstname']}" ?>"> <?php echo "</td>
                    <td>";?><input type="text" name="lastname" value="<?php echo"{$row['lastname']}" ?>"> <?php echo "</td>
                    <td>";?><input type="text" name="course" value="<?php echo"{$row['course']}" ?>"> <?php echo "</td>
                    <td>";?><input type="text" name="email" value="<?php echo"{$row['email']}" ?>"> <?php echo "</td>
                    </tr>\n";
            }
          }
        ?>
    <tr>
      <td colspan="5" align="center">
        <button><a href="2_display.php">Back<a></button>
        <button><input type="submit" value="Update"></button>
      </td>
    </tr>
  </tbody>
</table>
    <?php
  }
?>
