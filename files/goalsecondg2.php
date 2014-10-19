<?php
    require_once 'dbconnection.php';
    
    function saveGoalSecondG2($goalSecondId, $g2, $modifiedBy){
        try{
            $query = "insert into tbl_goal_second_g2 values(0, $goalSecondId, '$g2', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalSecondG2($id, $goalSecondId, $g2, $modifiedBy){
        try{
            $query = "update tbl_goal_second_g2 set goal_second_id = $goalSecondId, g2 = '$g2', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
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
    
    function getAllGoalSecondG2ForThisGoalSecondId($goalSecondId){
        try{
            $query = "select * from tbl_goal_second_g2 where goal_second_id = $goalSecondId";
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
    
    function getGoalSecondG2Using($goalSecondId, $g2){
        try{
            $query = "select * from tbl_goal_second_g2 where goal_second_id = $goalSecondId and g2 = '$g2'";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG2UsingAndModifiedBy($goalSecondId, $g2, $modifiedBy){
        try{
            $query = "select * from tbl_goal_second_g2 where goal_second_id = $goalSecondId and g2 = '$g2' and modified_by = $modifiedBy";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG2ForGoalSecondId($goalSecondId){
        try{
            $query = "select * from tbl_goal_second_g2 where goal_second_id = $goalSecondId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
