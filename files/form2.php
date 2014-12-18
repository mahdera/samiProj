<?php
    require_once 'dbconnection.php';

    function saveForm2($q2_1, $q2_2, $q2_3, $q2_4, $modifiedBy){
        try{
            $query = "insert into tbl_form_2 values(0,'$q2_1','$q2_2','$q2_3','$q2_4', $modifiedBy, NOW())";
            //echo $query;
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateForm2($id, $q2_1, $q2_2, $q2_3, $q2_4, $modifiedBy){
        try{
            $query = "update tbl_form_2 set q2_1 = '$q2_1', q2_2 = '$q2_2', q2_3 = '$q2_3', q2_4 = '$q2_4', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            //echo $query;
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteForm2($id){
        try{
            $query = "delete from tbl_form_2 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllForm2s(){
        try{
            $query = "select * from tbl_form_2";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getForm2ModifiedByUserOnThisDate($modifiedBy, $modificationDate){
        try{
            $query = "select * from tbl_form_2 where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getForm2ModifiedByUserUsingLevel($userLevel, $divisionId){
      try{
        $query = null;
        if($userLevel == '02'){
          $query = "select tbl_form_2.* from tbl_form_2, tbl_user_sub_district where tbl_form_2.modified_by = tbl_user_sub_district.user_id and " .
          "tbl_user_sub_district.sub_district_id = $divisionId order by tbl_form_2.modification_date desc limit 0,1";
          //echo $query;
          $result = read($query);
          $resultRow = mysql_fetch_object($result);
          return $resultRow;
        }else if($userLevel == '01'){
          //
        }
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getForm2($id){
        try{
            $query = "select * from tbl_form_2 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllForm2sModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_form_2 where modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getLatestForm2ModifiedByUsingUserLevelResultSet($userLevel, $divisionId){
      try{
        $query = null;
        if($userLevel == '02'){
          $query = "select tbl_form_2.* from tbl_form_2, tbl_user_sub_district where " .
          "tbl_form_2.modified_by = tbl_user_sub_district.user_id and " .
          "tbl_user_sub_district.sub_district_id = $divisionId order by modification_date desc limit 0,1";
        }else if($userLevel == 'Zone Level'){
          $query = "select tbl_goal_first_th.* from tbl_goal_first_th, tbl_user_zone " .
          "where tbl_goal_first_th.modified_by = tbl_user_zone.user_id and " .
          "tbl_user_zone.zone_id = $divisionId  UNION select tbl_goal_first_th.* from tbl_goal_first_th, tbl_user_branch, tbl_branch " .
          "where tbl_goal_first_th.modified_by = tbl_user_branch.user_id and ".
          "tbl_user_branch.branch_id = tbl_branch.id and tbl_branch.zone_id = $divisionId order by modification_date desc";
        }
        //echo $query;
        $result = read($query);
        return $result;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getAllForm2ModifiedByUsingUserLevel($userLevel, $divisionId){
      try{
        $query = null;
        if($userLevel == '02'){
          $query = "select tbl_form_2.* from tbl_form_2, tbl_user_sub_district where " .
          "tbl_form_2.modified_by = tbl_user_sub_district.user_id and " .
          "tbl_user_sub_district.sub_district_id = $divisionId order by modification_date desc";
        }else if($userLevel == 'Zone Level'){
          $query = "select tbl_goal_first_th.* from tbl_goal_first_th, tbl_user_zone " .
          "where tbl_goal_first_th.modified_by = tbl_user_zone.user_id and " .
          "tbl_user_zone.zone_id = $divisionId  UNION select tbl_goal_first_th.* from tbl_goal_first_th, tbl_user_branch, tbl_branch " .
          "where tbl_goal_first_th.modified_by = tbl_user_branch.user_id and ".
          "tbl_user_branch.branch_id = tbl_branch.id and tbl_branch.zone_id = $divisionId order by modification_date desc";
        }
        //echo $query;
        $result = read($query);
        return $result;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function checkIfForm2RecordIsAlreadyEntered($userLevel, $divisionId){
      try{
        $query = null;
        $cnt = 0;
        if($userLevel == '02'){
          $query = "select count(*) as cnt from tbl_form_2, tbl_user_sub_district where " .
          "tbl_form_2.modified_by = tbl_user_sub_district.user_id and " .
          "tbl_user_sub_district.sub_district_id = $divisionId";
          //echo $query;
          $result = read($query);
          $resultRow = mysql_fetch_object($result);
          $cnt = $resultRow->cnt;
          return $cnt;
        }
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }
?>
