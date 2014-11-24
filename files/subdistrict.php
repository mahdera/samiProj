<?php
  require_once 'dbconnection.php';
  function saveSubDistrict($districtId, $code, $displayName, $description){
    try{
      $query = "insert into tbl_sub_district values(0, $districtId, '$code', '$displayName', '$description')";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function updateSubDistrict($id, $districtId, $code, $displayName, $description){
    try{
      $query = "update tbl_sub_district set district_id = $districtId, code = '$code', display_name='$displayName', description = '$description' where id = $id";
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
      $query = "select * from tbl_sub_district order by display_name";
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
      $query = "select * from tbl_sub_district where district_id = $districtId order by display_name";
      //echo $query;
      $result = read($query);
      return $result;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }
?>
