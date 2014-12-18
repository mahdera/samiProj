<?php
  require_once 'dbconnection.php';
  function saveSubDistrict($districtId, $code, $displayName, $description, $modifiedBy){
    try{
      $query = "insert into tbl_sub_district values(0, $districtId, '$code', '$displayName', '$description', $modifiedBy, NOW() )";
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function updateSubDistrict($id, $districtId, $code, $displayName, $description, $modifiedBy){
    try{
      $query = "update tbl_sub_district set district_id = $districtId, code = '$code', display_name='$displayName', description = '$description', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
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

  function hasThisBranchAlreadySavedInDatabase($displayName){
    $count = 0;
    try{
      $query = "select count(*) as cnt from tbl_sub_district where display_name = '$displayName'";
      //echo $query;
      $result = read($query);
      $resultRow = mysql_fetch_object($result);
      $count = $resultRow->cnt;
      return $count;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getAllSubDistrictsOfThisDistrictHavingUsersUnderIt($districtId){
    try{
      $query = "select distinct tbl_sub_district.* from tbl_sub_district, tbl_user_sub_district, tbl_user where tbl_sub_district.district_id = $districtId and " .
      "tbl_sub_district.id = tbl_user_sub_district.sub_district_id and tbl_user_sub_district.user_id = tbl_user.id and tbl_user.user_status = 'Active'";
      //echo $query;
      $result = read($query);
      return $result;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getAllSubDistrictWithSubDistrictId($subDistrictId){
    try{
      $query = "select * from tbl_sub_district where id = $subDistrictId";
      $result = read($query);
      return $result;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }
?>
