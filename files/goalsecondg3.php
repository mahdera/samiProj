<?php
    require_once 'dbconnection.php';
    
    function saveGoalSecondG3($goalSecondId, $g3, $modifiedBy){
        try{
            $query = "insert into tbl_goal_second_g3 values(0, $goalSecondId, '$g3', $modifiedBy, NOW())";            
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalSecondG3($id, $goalSecondId, $g3, $modifiedBy){
        try{
            $query = "update tbl_goal_second_g3 set goal_second_id = $goalSecondId, g3='$g3', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
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
    
    function getAllGoalSecondG3ForThisGoalSecondId($goalSecondId){
        try{
            $query = "select * from tbl_goal_second_g3 where goal_second_id = $goalSecondId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSecondG3ForThisGoalSecondIdAndModifiedBy($goalSecondId, $modifiedBy){
        try{
            $query = "select * from tbl_goal_second_g3 where goal_second_id = $goalSecondId and modified_by = $modifiedBy";
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
    
    function getGoalSecondG3Using($goalSecondId, $g3){
        try{
            $query = "select * from tbl_goal_second_g3 where goal_second_id = $goalSecondId and g3 = '$g3'";            
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG3UsingAndModifiedBy($goalSecondId, $g3, $modifiedBy){
        try{
            $query = "select * from tbl_goal_second_g3 where goal_second_id = $goalSecondId and g3 = '$g3' and modified_by = $modifiedBy";            
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecondG3ForGoalSecondId($goalSecondId){
        try{
            $query = "select * from tbl_goal_second_g3 where goal_second_id = $goalSecondId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
