<?php
require_once 'dbconnection.php';

function getUserLevelLookUpUsingCode($code){
  try{
    $query = "select * from tbl_user_level_lookup where code = '$code'";
    $result = read($query);
    $resultRow = mysql_fetch_object($result);
    return $resultRow;
  }catch(Exception $ex){
    $ex->getMessage();
  }
}
?>
