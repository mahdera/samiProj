<?php
    require_once 'dbconnection.php';

    function saveGoalSecondG3($goalSecondFnId, $g3, $modifiedBy){
        try{
            $query = "insert into tbl_goal_second_g3 values(0, $goalSecondFnId, '$g3', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateGoalSecondG3($id, $goalSecondFnId, $g3, $modifiedBy){
        try{
            $query = "update tbl_goal_second_g3 set goal_second_fn_id = $goalSecondFnId, g3='$g3', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteGoalSecondG3($id){
        try{
            $query = "delete from tbl_goal_second_g3 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSecondG3s(){
        try{
            $query = "select * from tbl_goal_second_g3";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSecondG3ForThisGoalSecondFnId($goalSecondFnId){
        try{
            $query = "select * from tbl_goal_second_g3 where goal_second_fn_id = $goalSecondFnId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSecondG3ForThisGoalSecondFnIdAndModifiedBy($goalSecondFnId, $modifiedBy){
        try{
            $query = "select * from tbl_goal_second_g3 where goal_second_fn_id = $goalSecondFnId and modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG3($id){
        try{
            $query = "select * from tbl_goal_second_g3 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG3Using($goalSecondFnId, $g3){
        try{
            $query = "select * from tbl_goal_second_g3 where goal_second_fn_id = $goalSecondFnId and g3 = '$g3'";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG3UsingAndModifiedBy($goalSecondFnId, $g3, $modifiedBy){
        try{
            $query = "select * from tbl_goal_second_g3 where goal_second_fn_id = $goalSecondFnId and g3 = '$g3' and modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG3ForGoalSecondFnId($goalSecondFnId){
        try{
            $query = "select * from tbl_goal_second_g3 where goal_second_fn_id = $goalSecondFnId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
