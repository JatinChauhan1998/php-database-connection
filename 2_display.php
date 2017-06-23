<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sdpi";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$selectSQL = 'SELECT * FROM `sample`';

  if( !( $selectRes = mysqli_query( $conn , $selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
  }else{
    ?>
<table border="1" align ="center">
  <thead>
    <tr>
      <th>ID</th>
      <th>Image</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Course</th>
      <th>Email</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="8">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
          echo "<tr>
                    <td>{$row['id']}</td>
                    <td>";?> <img src="<?php echo"{$row['image']}";?>" alt="image" width="50px" height="50px" > <?php echo"</td>
                    <td>{$row['firstname']}</td>
                    <td>{$row['lastname']}</td>
                    <td>{$row['course']}</td>
                    <td>{$row['email']}</td>
                    <td>";?><a href="edit.php?position=<?php echo"{$row['id']}"?>">Edit<a><?php echo"</td>
                    <td>";?><a href="delete.php?position=<?php echo"{$row['id']}"?>">Delete<a><?php echo"</td>
                </tr>\n";
        }
      }
    ?>
    <tr>
        <td colspan="8" align="center"><button><a href="index.html">Back</a></button></td>
    </tr>
  </tbody>
</table>
    <?php
  }

?>
