<?php
  require_once 'dbconnection.php';
  function saveSubDistrict($districtId, $subDistrictName, $description){
    try{
      $query = "insert into tbl_sub_district values(0, $districtId, '$subDistrictName', '$description')";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function updateSubDistrict($id, $districtId, $subDistrictName, $description){
    try{
      $query = "update tbl_sub_district set district_id = $districtId, sub_district_name = '$subDistrictName', description = '$description' where id = $id";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function deleteSubDistrict($id){
    try{
      $query = "delete from tbl_sub_district where id = $id";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getAllSubDistricts(){
    try{
      $query = "select * from tbl_sub_district order by sub_district_name";
      $result = read($query);
      return $result;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getSubDistrict($id){
    try{
      $query = "select * from tbl_sub_district where id = $id";
      $result = read($query);
      $resultRow = mysql_fetch_object($result);
      return $resultRow;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getAllSubDistrictsOfThisDistrict($districtId){
    try{
      $query = "select * from tbl_sub_district where district_id = $districtId order by sub_district_name";
      //echo $query;
      $result = read($query);
      return $result;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }
?>
