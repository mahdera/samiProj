<?php
  require_once 'user.php';
  $email = $_POST['email'];
  $userExists = doesThisUserAccountExistUsingEmail($email);
  echo $userExists;
?>
