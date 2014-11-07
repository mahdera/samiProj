<?php
    require_once 'dbconnection.php';

    function saveGoalSecondG1($goalSecondFnId, $g1, $modifiedBy){
        try{
            $query = "insert into tbl_goal_second_g1 values(0, $goalSecondFnId, '$g1', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateGoalSecondG1($id, $goalSecondFnId, $g1, $modifiedBy){
        try{
            $query = "update tbl_goal_second_g1 set goal_second_fn_id = $goalSecondFnId, g1 = '$g1', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteGoalSecondG1($id){
        try{
            $query = "delete from tbl_goal_second_g1 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSecondG1s(){
        try{
            $query = "select * from tbl_goal_second_g1";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSecondG1ForThisGoalSecondFnId($goalSecondFnId){
        try{
            $query = "select * from tbl_goal_second_g1 where goal_second_fn_id = $goalSecondFnId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSecondG1ForThisGoalSecondFnIdAndModifiedBy($goalSecondFnId, $modifiedBy){
        try{
            $query = "select * from tbl_goal_second_g1 where goal_second_fn_id = $goalSecondFnId and modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG1($id){
        try{
            $query = "select * from tbl_goal_second_g1 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG1Using($goalSecondFnId, $g1){
        try{
            $query = "select * from tbl_goal_second_g1 where goal_second_fn_id = $goalSecondFnId and g1 = '$g1'";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG1UsingAndModifiedBy($goalSecondFnId, $g1, $modifiedBy){
        try{
            $query = "select * from tbl_goal_second_g1 where goal_second_fn_id = $goalSecondFnId and g1 = '$g1' and modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG1ForGoalSecondFnId($goalSecondFnId){
        try{
            $query = "select * from tbl_goal_second_g1 where goal_second_fn_id = $goalSecondFnId";
            //echo $query;
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
