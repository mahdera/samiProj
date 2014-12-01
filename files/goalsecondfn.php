<?php
    require_once 'dbconnection.php';

    function saveGoalSecondFn($goalSecondId, $fnId, $modifiedBy){
        try{
            $query = "insert into tbl_goal_second_fn values(0, $goalSecondId, $fnId, $modifiedBy, NOW())";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function updateGoalSecondFn($id, $goalSecondId, $fnId, $modifiedBy){
        try{
            $query = "update tbl_goal_second_fn set goal_second_id = $goalSecondId, fn_id = $fnId, modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function deleteGoalSecondFn($id){
        try{
            $query = "delete from tbl_goal_second_fn where id = $id";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllGoalSecondFns(){
        try{
            $query = "select * from tbl_goal_second_fn order by modification_date desc";
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getGoalSecondFn($id){
        try{
            $query = "select * from tbl_goal_second_fn where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($query);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getGoalSecondFnUsingModifiedyBy($modifiedBy){
        try{
            $query = "select * from tbl_goal_second_fn where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getGoalSecondFnUsingModifiedyByUsingUserLevel($userLevel, $divisionId){
        try{
          $query = null;
          if($userLevel == '02'){
            $query = "select tbl_goal_second_fn.* from tbl_goal_second_fn, tbl_user_sub_district where tbl_goal_second_fn.modified_by = " .
            "tbl_user_sub_district.user_id and tbl_user_sub_district.sub_district_id = $divisionId order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
          }else if($userLevel == '01'){
            //for future district level fetching if deemed necessary
          }
        }catch(Exception $ex){
          $ex->getMessage();
        }
    }

    function getAllGoalSecondFnsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_goal_second_fn where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getGoalSecondFnUsingFnId($fnId){
        try{
            $query = "select * from tbl_goal_second_fn where fn_id = $fnId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllGoalSecondFnsForGoalSecond($goalSecondId){
        try{
            $query = "select * from tbl_goal_second_fn where goal_second_id = $goalSecondId";
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllGoalSecondFnsForThisGoalSecondId($goalSecondId){
        try{
            $query = "select * from tbl_goal_second_fn where goal_second_id = $goalSecondId";
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllGoalSecondFnsModifiedByUsingUserLevel($userLevel, $divisionId){
        try{
            $query = null;
            if($userLevel == '02'){
                $query = "select tbl_goal_second_fn.* from tbl_goal_second_fn, tbl_user_sub_district where " .
                "tbl_goal_second_fn.modified_by = tbl_user_sub_district.user_id and " .
                "tbl_user_sub_district.sub_district_id = $divisionId order by modification_date desc";
            }else if($userLevel == 'Zone Level'){
                $query = "select tbl_goal_second_fn.* from tbl_goal_second_fn, tbl_user_zone " .
                "where tbl_goal_second_fn.modified_by = tbl_user_zone.user_id and " .
                "tbl_user_zone.zone_id = $divisionId  UNION select tbl_goal_second_fn.* from tbl_goal_second_fn, tbl_user_branch, tbl_branch " .
                "where tbl_goal_second_fn.modified_by = tbl_user_branch.user_id and ".
                "tbl_user_branch.branch_id = tbl_branch.id and tbl_branch.zone_id = $divisionId order by modification_date desc";
            }
            //echo $query;
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function hasThisFnBeenUsedForGoalSecondByUsingUserLevel($fnId, $userLevel, $divisionId){
        try{
            $query = null;
            if($userLevel == '02'){
                $query = "select count(*) as cnt from tbl_goal_second_fn, tbl_user_sub_district where fn_id = $fnId and tbl_goal_second_fn.modified_by = " .
                "tbl_user_sub_district.user_id and tbl_user_sub_district.sub_district_id = $divisionId";
                //echo $query;
            }
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            $cntVal = $resultRow->cnt;
            if($cntVal != 0)
                return true;
            else
                return false;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function hasThisFnBeenUsedForGoalSecondByThisUser($fnId, $modifiedBy){
        $cntVal = 0;
        try{
            $query = "select count(*) as cnt from tbl_goal_second_fn where fn_id = $fnId and modified_by = $modifiedBy";
            //echo $query;
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            $cntVal = $resultRow->cnt;
            if($cntVal != 0)
                return true;
            else
                return false;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }
?>
