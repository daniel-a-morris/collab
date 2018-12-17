<html>
  <body>
<?php

require_once('mysqli_connect.php');


$query = "SELECT first_name, last_name, time_entered, student_id FROM students";

$response = @mysqli_query($dbc,$query);

if($response){
  
  
  echo '<table align="left"
  cellspacing="5" cellpadding="8">
  
  <tr>
  <td align="left"><b>First Name</b></td>
  <td align="left"><b>Last Name</b></td>
  <td align="left"><b>Student Id</b></td>
  <td align="left"><b>Timestamp</b></td>
  </tr>';
  
  while($row = mysqli_fetch_array($response)){
    
    echo '<tr><td align = "left">' .
    $row[first_name] . '</td><td align = "left">' .
    $row[last_name] . '</td><td align = "left">' .
    $row[student_id] . '</td><td align = "left">' .
    $row[time_entered] . '</td><td align = "left">';
    
    echo '</tr>';
    
  }
  
  echo '</table';
  
} else {
  
  echo "Couldn't issue database query: ";
  
  echo mysqli_error($dbc);
  
}


mysqli_close($dbc);




?>

<br>

<p><a href="links.html"><b>Back to home</b></a></p>

</body>
</html>
