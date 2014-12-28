<?php
    require_once 'dbconnection.php';

    function saveFnAction($fnId, $actionText, $modifiedBy){
        try{
            $query = "insert into tbl_fn_action values(0, $fnId, '$actionText', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateFnAction($id, $actionText, $modifiedBy){
        try{
            $query = "update tbl_fn_action set action_text = '$actionText', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteFnAction($id){
        try{
            $query = "delete from tbl_fn_action where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllFnActions(){
        try{
            $query = "select * from tbl_fn_action";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllFnActionsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_fn_action where modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getFnAction($id){
        try{
            $query = "select * from tbl_fn_action where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function doesThisFnAlreadyActionFilledForIt($fnId){
        try{
            $query = "select count(*) as cnt from tbl_fn_action where fn_id = $fnId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow->cnt;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function doesThisFnAlreadyActionFilledForItUsingDivision($fnId, $divisionId){
        try{
            $query = "select count(*) as cnt from tbl_fn_action, tbl_user_sub_district where fn_id = $fnId and " .
            "tbl_fn_action.modified_by = tbl_user_sub_district.user_id and tbl_user_sub_district.sub_district_id = $divisionId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow->cnt;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function doesThisFnAlreadyActionFilledForItByUser($fnId, $modifiedBy){
        try{
            $query = "select count(*) as cnt from tbl_fn_action where fn_id = $fnId and modified_by = $modifiedBy";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow->cnt;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllFnActionsForThisFn($fnId){
        try{
            $query = "select * from tbl_fn_action where fn_id = $fnId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }


    function getAllFnActionsForThisFnModifiedBy($fnId, $modifiedBy){
        try{
            $query = "select * from tbl_fn_action where fn_id = $fnId and modified_by = $modifiedBy";
            //echo $query;
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllFnActionsModifiedByUsingUserLevel($userLevel, $divisionId){
      try{
        $query = null;
        if($userLevel == '02'){
          $query = "select tbl_fn_action.* from tbl_fn_action, tbl_user_sub_district where " .
          "tbl_fn_action.modified_by = tbl_user_sub_district.user_id and " .
          "tbl_user_sub_district.sub_district_id = $divisionId order by modification_date desc";
        }else if($userLevel == 'Zone Level'){
          $query = "select tbl_goal_first_th.* from tbl_goal_first_th, tbl_user_zone " .
          "where tbl_goal_first_th.modified_by = tbl_user_zone.user_id and " .
          "tbl_user_zone.zone_id = $divisionId  UNION select tbl_goal_first_th.* from tbl_goal_first_th, tbl_user_branch, tbl_branch " .
          "where tbl_goal_first_th.modified_by = tbl_user_branch.user_id and ".
          "tbl_user_branch.branch_id = tbl_branch.id and tbl_branch.zone_id = $divisionId order by modification_date desc";
        }
        //echo $query;
        $result = null;
        $result = read($query);
        return $result;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getFnActionUsingDivision($fnId, $divisionId){
        try{
            $query = "select tbl_fn_action.* from tbl_fn_action, tbl_user_sub_district where " .
            "tbl_fn_action.modified_by = tbl_user_sub_district.user_id and " .
            "tbl_user_sub_district.sub_district_id = $divisionId and fn_id = $fnId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getFnActionForFn($fnId){
      try{
        $query = "select * from tbl_fn_action where fn_id = $fnId order by modification_date limit 0,1";
        $result = read($query);
        $resultRow = mysql_fetch_object($result);
        return $resultRow;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getFnActionForFnUsingDivision($fnId, $divisionId){
        try{
            $query = "select tbl_fn_action.* from tbl_fn_action, tbl_user_sub_district where " .
            "tbl_fn_action.modified_by = tbl_user_sub_district.user_id and " .
            "tbl_user_sub_district.sub_district_id = $divisionId and fn_id = $fnId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function deleteFnActionForFn($fnId){
      try{
        $query = "delete from tbl_fn_action where fn_id = $fnId";
        save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function updateFnActionForFn($fnId, $actionText){
        try{
            $query = "update tbl_fn_action set action_text = '$actionText' where fn_id = $fnId";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

?>
