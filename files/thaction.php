<?php
    require_once 'dbconnection.php';

    function saveThAction($thId, $actionText, $modifiedBy){
        try{
            $query = "insert into tbl_th_action values(0, $thId, '$actionText', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateThAction($id, $actionText, $modifiedBy){
        try{
            $query = "update tbl_th_action set action_text = '$actionText', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            //echo $query;
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteThAction($id){
        try{
            $query = "delete from tbl_th_action where id = $id";
            //echo $query;
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllThActions(){
        try{
            $query = "select * from tbl_th_action";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllThActionsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_th_action where modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllThActionsModifiedByUsingUserLevel($userLevel, $divisionId){
      try{
        $query = null;
        if($userLevel == '02'){
          $query = "select tbl_th_action.* from tbl_th_action, tbl_user_sub_district where " .
          "tbl_th_action.modified_by = tbl_user_sub_district.user_id and " .
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

    function getThAction($id){
        try{
            $query = "select * from tbl_th_action where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function doesThisThAlreadyActionFilledForIt($thId){
        try{
            $query = "select count(*) as cnt from tbl_th_action where th_id = $thId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow->cnt;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllThActionsForThisTh($thId){
      try{
          $query = "select * from tbl_th_action where th_id = $thId";
          $result = read($query);
          return $result;
      } catch (Exception $ex) {
          $ex->getMessage();
      }
    }

    function getAllThActionsForThisThModifiedBy($thId, $modifiedBy){
      try{
          $query = "select * from tbl_th_action where th_id = $thId and modified_by = $modifiedBy";
          $result = read($query);
          return $result;
      } catch (Exception $ex) {
          $ex->getMessage();
      }
    }

    function getAllThActionForThisTh($thId){
      try{
        $query = "select * from tbl_th_action where th_id = $thId";
        $result = read($query);
        return $result;
      } catch (Exception $ex) {
        $ex->getMessage();
      }
    }
?>
