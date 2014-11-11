<?php
  require_once 'dbconnection.php';
  function saveBranch($zoneId, $branchName, $description){
    try{
      $query = "insert into tbl_branch values(0, $zoneId, '$branchName', '$description')";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function updateBranch($id, $zoneId, $branchName, $description){
    try{
      $query = "update tbl_branch set zone_id = '$zoneId', branch_name = '$branchName', description = '$description' where id = $id";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function deleteBranch($id){
    try{
      $query = "delete from tbl_branch where id = $id";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getAllBranchs(){
    try{
      $query = "select * from tbl_branch order by branch_name";
      $result = read($query);
      return $result;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getBranch($id){
    try{
      $query = "select * from tbl_branch where id = $id";
      $result = read($query);
      $resultRow = mysql_fetch_object($result);
      return $resultRow;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }
?>
