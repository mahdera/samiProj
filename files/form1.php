<?php
    require_once 'dbconnection.php';

    function saveForm1($title, $form_date, $plan, $q1, $q2, $modifiedBy){
        try{
            $title = mysql_real_escape_string($title);
            $plan = mysql_real_escape_string($plan);
            $q1 = mysql_real_escape_string($q1);
            $q2 = mysql_real_escape_string($q2);
            $query = "insert into tbl_form_1 values(0,'$title','$form_date', '$plan', '$q1','$q2', $modifiedBy, NOW())";
            //echo $query;
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateForm1($id, $title, $form_date, $plan, $q1, $q2, $modifiedBy){
        try{
            $title = mysql_real_escape_string($title);
            $plan = mysql_real_escape_string($plan);
            $q1 = mysql_real_escape_string($q1);
            $q2 = mysql_real_escape_string($q2);
            $query = "update tbl_form_1 set title = '$title', form_date = '$form_date', plan='$plan', q1 = '$q1', q2 = '$q2', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteForm1($id){
        try{
            $query = "delete from tbl_form_1 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllForm1s(){
        try{
            $query = "select * from tbl_form_1";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllForm1sModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_form_1 where modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllForm1ModifiedByUsingUserLevel($userLevel, $divisionId){
        try{
          $query = null;
          if($userLevel == '02'){
            $query = "select tbl_form_1.* from tbl_form_1, tbl_user_sub_district where " .
            "tbl_form_1.modified_by = tbl_user_sub_district.user_id and " .
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

    function getForm1($id){
        try{
            $query = "select * from tbl_form_1 where id = $id";
            //echo $query;
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getForm1Using($title, $form_date){
        try{
            $query = "select * from tbl_form_1 where title = '$title' and form_date = '$form_date'";
            //echo $query;
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getForm1ModifiedByUserOnThisDate($modifiedBy, $modificationDate){
        try{
            $query = "select * from tbl_form_1 where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getLatestForm1ModifiedByUser($modifiedBy){
        try{
            $query = "select * from tbl_form_1 where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getLatestForm1ModifiedByUserUsingLevel($userLevel, $divisionId){
      $query = null;
      try{
        if($userLevel == '02'){
          $query = "select tbl_form_1.* from tbl_form_1, tbl_user_sub_district where tbl_form_1.modified_by = " .
          "tbl_user_sub_district.user_id and tbl_user_sub_district.sub_district_id = $divisionId order by tbl_form_1.modification_date desc limit 0,1";
          $result = read($query);
          $resultRow = mysql_fetch_object($result);
          return $resultRow;
        }else if($userLevel == '01'){
          //code goes here for future need...
        }
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getMaxFormIdForUser($modifiedBy){
      try{
        $query = "select * from tbl_form_1 where modified_by = $modifiedBy order by modification_date desc limit 0,1";
        $result = read($query);
        $resultRow = mysql_fetch_object($result);
        return $resultRow->id;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }
?>
