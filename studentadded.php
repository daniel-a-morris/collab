<html>
<head>
  <title>Student Added</title>
</head>
<body>
  
<?php

if(isset($_POST[submit])){
  
  $data_missing = array();
  
  if(empty($_POST['first_name'])){
    
    $data_missing[] = 'First Name';
    
  } else {
    
    $first_name = trim($_POST['first_name']);
    
  }
  
  if(empty($_POST['last_name'])){
    
    $data_missing[] = 'Last Name';
    
  } else {
    
    $last_name = trim($_POST['last_name']);
    
  }
  
  if(empty($data_missing)){
    
    require_once('mysqli_connect.php');
    
    $query = "INSERT INTO students (first_name,last_name,time_entered,student_id) VALUES (?,?,NOW(),NULL)";
    
    $stmt = mysqli_prepare($dbc,$query);
    
    mysqli_stmt_bind_param($stmt,"ss",$first_name,$last_name);
    
    mysqli_stmt_execute($stmt);
    
    $affected_rows = mysqli_stmt_affected_rows($stmt);
    
    if ($affected_rows == 1){
      
      echo 'Student Entered';
      
      mysqli_stmt_close($stmt);
      
      mysqli_close($dbc);
      
    } else {
      
      echo 'Error occured <br>';
      echo mysqli_error();
      
      mysqli_stmt_close($stmt);
      
      mysqli_close($dbc);
    }
    
  }else{
    
    echo 'You need to enter the following data: <br>';
    
    foreach($data_missing as $missing){
      
      echo "$missing<br>";
      
    }
    
  }
  
}






?>
  
<p><a href="links.html"><b>Back to home</b></a></p>
  
</body>
</html>
