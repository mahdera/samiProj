<?php
  require_once 'dbconnection.php';
  function saveDistrict($districtName, $description){
    try{
      $query = "insert into tbl_district values(0, '$districtName', '$description')";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function updateDistrict($id, $districtName, $description){
    try{
      $query = "update tbl_district set district_name = '$districtName', description = '$description' where id = $id";
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
      $query = "select * from tbl_district order by district_name";
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
