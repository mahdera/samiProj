<?php
    require_once 'dbconnection.php';

    function saveUserZone($zoneId, $userId){
      try{
        $query = "insert into tbl_user_zone values(0, $zoneId, $userId)";
        save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function updateUserZone($id, $zoneId, $userId){
      try{
        $query = "update tbl_user_zone set zone_id = $zoneId, user_id = $userId where id = $id";
        save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function deleteUserZone($id){
      try{
        $query = "delete from tbl_user_zone where id = $id";
        save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getAllUserZones(){
      try{
        $query = "select * from tbl_user_zone";
        $result = read($query);
        return $result;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getUserZone($id){
      try{
        $query = "select * from tbl_user_zone where id = $id";
        $result = read($query);
        $resultRow = mysql_fetch_object($result);
        return $resultRow;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getZoneInfoForUser($userId){
      try{
        $query = "select * from tbl_user_zone where user_id = $userId";
        $result = read($query);
        $resultRow = mysql_fetch_object($result);
        return $resultRow;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }
?>
