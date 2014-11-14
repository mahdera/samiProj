<?php
  require_once 'dbconnection.php';
  function saveZone($zoneName, $description){
    try{
      $query = "insert into tbl_zone values(0, '$zoneName', '$description')";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function updateZone($id, $zoneName, $description){
    try{
      $query = "update tbl_zone set zone_name = '$zoneName', description = '$description' where id = $id";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function deleteZone($id){
    try{
      $query = "delete from tbl_zone where id = $id";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getAllZones(){
    try{
      $query = "select * from tbl_zone order by zone_name";
      $result = read($query);
      return $result;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getZone($id){
    try{
      $query = "select * from tbl_zone where id = $id";
      $result = read($query);
      $resultRow = mysql_fetch_object($result);
      return $resultRow;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getAllZonesWithZoneId($zoneId){
    try{
      $query = "select * from tbl_zone where id = $zoneId";
      $result = read($query);
      return $result;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }
?>
