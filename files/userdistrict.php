<?php
    require_once 'dbconnection.php';

    function saveUserDistrict($districtId, $userId){
      try{
        $query = "insert into tbl_user_district values(0, $districtId, $userId)";
        save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function updateUserDistrict($id, $districtId, $userId){
      try{
        $query = "update tbl_user_district set district_id = $districtId, user_id = $userId where id = $id";
        save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function deleteUserDistrict($id){
      try{
        $query = "delete from tbl_user_district where id = $id";
        save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getAllUserDistricts(){
      try{
        $query = "select * from tbl_user_district";
        $result = read($query);
        return $result;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getUserDistrict($id){
      try{
        $query = "select * from tbl_user_district where id = $id";
        $result = read($query);
        $resultRow = mysql_fetch_object($result);
        return $resultRow;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getDistrictInfoForUser($userId){
      try{
        $query = "select * from tbl_user_district where user_id = $userId";
        $result = read($query);
        $resultRow = mysql_fetch_object($result);
        return $resultRow;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function deleteUserDistrictForThisUser($userId){
      try{
        $query = "delete from tbl_user_district where user_id = $userId";
        save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function updateUserDistrictForUser($userId, $districtId){
      try{
        $query = "update tbl_user_district set district_id = $districtId where user_id = $userId";
        save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function doesThisUserHasExistingUserDistrictRecord(){
      try{
        $cntVal = 0;
        $query = "select count(*) as cnt from tbl_user_district where user_id = $userId";
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
