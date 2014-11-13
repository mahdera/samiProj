<?php
    require_once 'dbconnection.php';

    function saveUserBranch($branchId, $userId){
      try{
        $query = "insert into tbl_user_branch values(0, $branchId, $userId)";
        save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function updateUserBranch($id, $branchId, $userId){
      try{
        $query = "update tbl_user_branch set branch_id = $branchId, user_id = $userId where id = $id";
        save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function deleteUserBranch($id){
      try{
        $query = "delete from tbl_user_branch where id = $id";
        save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getAllUserBranchs(){
      try{
        $query = "select * from tbl_user_branch";
        $result = read($query);
        return $result;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getUserBranch($id){
      try{
        $query = "select * from tbl_user_branch where id = $id";
        $result = read($query);
        $resultRow = mysql_fetch_object($result);
        return $resultRow;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getBranchInfoForUser($userId){
      try{
        $query = "select * from tbl_user_branch where user_id = $userId";
        $result = read($query);
        $resultRow = mysql_fetch_object($result);
        return $resultRow;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function updateUserBranchForUser($userId, $branchId){
      try{
        $query = "update tbl_user_branch set branch_id = $branchId where user_id = $userId";
        save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function deleteUserBranchForThisUser($userId){
      try{
        $query = "delete from tbl_user_branch where user_id = $userId";
        save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function doesThisUserHasExistingUserBranchRecord($userId){
      try{
        $cntVal = 0;
        $query = "select count(*) as cnt from tbl_user_branch where user_id = $userId";
        $result = read($query);
        $resultRow = mysql_fetch_object($result);
        $cntVal = $resultRow->cnt;
        if($cntVal){
          return true;
        }else{
          return false;
        }
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }
?>
