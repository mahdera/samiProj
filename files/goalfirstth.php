<?php
    require_once 'dbconnection.php';

    function saveGoalFirstTh($goalFirstId, $thId, $modifiedBy){
        try{
            $query = "insert into tbl_goal_first_th values(0, $goalFirstId, $thId, $modifiedBy, NOW())";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function updateGoalFirstTh($id, $goalFirstId, $thId, $modifiedBy){
        try{
            $query = "update tbl_goal_first_th set goal_first_id = $goalFirstId, th_id = $thId, modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function deleteGoalFirstTh($id){
        try{
            $query = "delete from tbl_goal_first_th where id = $id";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllGoalFirstThs(){
        try{
            $query = "select * from tbl_goal_first_th order by modification_date desc";
            $result = read($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getGoalFirstTh($id){
        try{
            $query = "select * from tbl_goal_first_th where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllGoalFirstThsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_goal_first_th where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllGoalFirstThsModifiedByUsingUserLevel($userLevel, $divisionId){
        try{
            $query = null;
            if($userLevel == '02'){
                $query = "select tbl_goal_first_th.* from tbl_goal_first_th, tbl_user_sub_district where " .
                "tbl_goal_first_th.modified_by = tbl_user_sub_district.user_id and " .
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

    function getGoalFirstFromGoalFirstThUsingThId($thId){
        try{
            $query = "select * from tbl_goal_first_th where th_id = $thId";
            //echo $query;
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getGoalFirstThUsingModifiedyBy($modifiedBy){
        try{
            $query = "select * from tbl_goal_first_th where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstThsForThisGoalFirst($goalFirstId){
        try{
            $query = "select * from tbl_goal_first_th where goal_first_id = $goalFirstId order by modification_date desc";
            //echo $query;
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getGoalFirstThUsingThId($thId){
        try{
            $query = "select * from tbl_goal_first_th where th_id = $thId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function hasThisThBeenUsedForGoalFirstByThisUser($thId, $modifiedBy){
        $cntVal = 0;
        try{
            $query = "select count(*) as cnt from tbl_goal_first_th where th_id = $thId and modified_by = $modifiedBy";
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
