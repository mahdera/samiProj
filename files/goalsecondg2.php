<?php
    require_once 'dbconnection.php';

    function saveGoalSecondG2($goalSecondFnId, $g2, $modifiedBy){
        try{
            $query = "insert into tbl_goal_second_g2 values(0, $goalSecondFnId, '$g2', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateGoalSecondG2($id, $goalSecondFnId, $g2, $modifiedBy){
        try{
            $query = "update tbl_goal_second_g2 set goal_second_fn_id = $goalSecondFnId, g2 = '$g2', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteGoalSecondG2($id){
        try{
            $query = "delete from tbl_goal_second_g2 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSecondG2s(){
        try{
            $query = "select * from tbl_goal_second_g2";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSecondG2ForThisGoalSecondFnId($goalSecondFnId){
        try{
            $query = "select * from tbl_goal_second_g2 where goal_second_fn_id = $goalSecondFnId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSecondG2ForThisGoalSecondFnIdAndModifiedBy($goalSecondFnId, $modifiedBy){
        try{
            $query = "select * from tbl_goal_second_g2 where goal_second_fn_id = $goalSecondFnId and modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG2($id){
        try{
            $query = "select * from tbl_goal_second_g2 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG2Using($goalSecondFnId, $g2){
        try{
            $query = "select * from tbl_goal_second_g2 where goal_second_fn_id = $goalSecondFnId and g2 = '$g2'";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG2UsingAndModifiedBy($goalSecondFnId, $g2, $modifiedBy){
        try{
            $query = "select * from tbl_goal_second_g2 where goal_second_fn_id = $goalSecondFnId and g2 = '$g2' and modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG2ForGoalSecondFnId($goalSecondFnId){
        try{
            $query = "select * from tbl_goal_second_g2 where goal_second_fn_id = $goalSecondFnId";            
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
