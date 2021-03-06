<?php
  require_once 'dbconnection.php';
  function saveDistrict($code,$displayName, $description){
    try{
      $query = "insert into tbl_district values(0, '$code', '$displayName', '$description')";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function updateDistrict($id, $code, $displayName, $description){
    try{
      $query = "update tbl_district set code = '$code', display_name = '$displayName', description = '$description' where id = $id";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function deleteDistrict($id){
    try{
      $query = "delete from tbl_district where id = $id";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getAllDistricts(){
    try{
      $query = "select * from tbl_district order by display_name";
      $result = read($query);
      return $result;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getDistrict($id){
    try{
      $query = "select * from tbl_district where id = $id";
      $result = read($query);
      $resultRow = mysql_fetch_object($result);
      return $resultRow;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getAllDistrictsWithZoneId($zoneId){
    try{
      $query = "select * from tbl_district where id = $zoneId";
      $result = read($query);
      return $result;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getAllDistrictsWithDistrictId($districtId){
    try{
      $query = "select * from tbl_district where id = $districtId";
      $result = read($query);
      return $result;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }
?>
