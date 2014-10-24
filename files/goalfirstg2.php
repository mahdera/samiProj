<?php
    require_once 'dbconnection.php';

    function saveGoalFirstG2($goalFirstId, $g2, $fn, $modifiedBy){
        try{
            $query = "insert into tbl_goal_first_g2 values(0, $goalFirstId, '$g2', $fn, $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateGoalFirstG2($id, $goalFirstId, $g2, $fn, $modifiedBy){
        try{
            $query = "update tbl_goal_first_g2 set goal_first_id = $goalFirstId, g2 = '$g2', fn_id = $fn, modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteGoalFirstG2($id){
        try{
            $query = "delete from tbl_goal_first_g2 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstG2s(){
        try{
            $query = "select * from tbl_goal_first_g2";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstG2ForThisGoalFirstId($goalFirstId){
        try{
            $query = "select * from tbl_goal_first_g2 where goal_first_id = $goalFirstId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstG2ForThisGoalFirstIdAndModifiedBy($goalFirstId, $modifiedBy){
        try{
            $query = "select * from tbl_goal_first_g2 where goal_first_id = $goalFirstId and modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstsirstG2ForThisGoalFirstIdAndModifiedBy($goalFirstId, $modifiedBy){
        try{
            $query = "select * from tbl_goal_first_g2 where goal_first_id = $goalFirstId and modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstG2($id){
        try{
            $query = "select * from tbl_goal_first_g2 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstG2Using($goalFirstId, $g2, $g2Fn){
        try{
            $query = "select * from tbl_goal_first_g2 where goal_first_id = $goalFirstId and g2 = '$g2' and fn_id = $g2Fn";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstG2UsingAndModifiedBy($goalFirstId, $g2, $g2Fn, $modifiedBy){
        try{
            $query = "select * from tbl_goal_first_g2 where goal_first_id = $goalFirstId and g2 = '$g2' and fn_id = $g2Fn and modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstG2ForGoalFirst($goalFirstId){
        try{
            $query = "select * from tbl_goal_first_g2 where goal_first_id = $goalFirstId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstG2ForGoalFirstId($goalFirstId){
        try{
            $query = "select * from tbl_goal_first_g2 where goal_first_id = $goalFirstId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
