
<!DOCTYPE html>
<html>
<style>
        .center {
            margin: auto;
            width: 500px;
            border: 1px solid #9e9e9e;
            padding: 10px;
        }
        table, th, td {
            border: 1px groove;
        }
    </style>

<body>

<div class="center">
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    //   $fav_food = $_POST['fav_food'];
    $comment_area = $_POST['comment_area'];
    $tod = $_POST['tod'];

    $fav_foods=$_POST['fav_food'];  
    $fav_food=""; 
    foreach($fav_foods as $fav_food1){  
            $fav_food .= $fav_food1.",";  
    }

    $fav_food = rtrim($fav_food, ',')

?>

<h2>Customer Data Update Info</h2>

<table style="width:100%">
  <tr>
    <th>Title</th>
    <th>Value</th>
  </tr>
  <tr>
    <td>First Name</td>
    <td><?=$fname?></td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><?=$lname?></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><?=$gender?></td>
  </tr>
  <tr>
    <td>Favourite Food</td>
    <td><?=$fav_food?></td>
  </tr>
  <tr>
    <td>Favourite Time of the Day</td>
    <td><?=$tod?></td>
  </tr>
  <tr>
    <td>Comment</td>
    <td><?=$comment_area?></td>
  </tr>
</table>


<?php

    $user = "root";
    $pass = "r00t";
    $host = "localhost:3306";
    $dbdb = "marketing";
    
    $conn = new mysqli($host, $user, $pass, $dbdb);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO marketing.customer_data (fname, lname, gender, fav_food, ftd, comment) VALUES('$fname', '$lname', '$gender', '$fav_food', '$tod', ' $comment_area');";

    if ($conn->query($sql) === TRUE) {
        echo("<p>Record updated successfully</p>");
    } else {
        echo("<p>Error updating record</p>");
    }

    $conn->close();

    }
?>

</div>

</body>
</html>