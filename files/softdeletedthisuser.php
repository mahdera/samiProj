<?php
  session_start();
  $id = $_GET['id'];
  require_once 'user.php';
  deleteUser($id);
  require_once 'showusermanagementlist.php';
?>
