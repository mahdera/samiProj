<?php
  session_start();  
  //get the userid and password from the login box... 
  $userId = $_POST['username'];
  $password = $_POST['password'];
  //now check on the database if there exists a user with the given userid and password.
  require_once 'files/user.php';
  $success = isThereAUserWithUserIdAndPassword($userId,$password);
  
  if($success){
      $_SESSION['USER_ID'] = $userId;      
      header('Location: intro1.php');
  }else{
      $_SESSION['messageToUser'] = "Invalid User Id or Password.";
      header('Location: login.php');
  }
?>
