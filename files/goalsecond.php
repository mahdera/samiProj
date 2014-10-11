<?php
    require_once 'dbconnection.php';
    
    function saveGoalSecond($fnId, $modifiedBy){
        try{
            $query = "insert into tbl_goal_second values(0, $fnId, $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalSecond($id, $fnId, $modifiedBy){
        try{
            $query = "update tbl_goal_second set fn_id = $fnId, modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteGoalSecond($id){
        try{
            $query = "delete from tbl_goal_second where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalSeconds(){
        try{
            $query = "select * from tbl_goal_second";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getGoalSecond($id){
        try{
            $query = "select * from tbl_goal_second where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getGoalSecondUsingFnId($fnId){
        try{
            $query = "select * from tbl_goal_second where fn_id = $fnId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalSecondsUsingFnId($fnId){
        try{
            $query = "select * from tbl_goal_second where fn_id = $fnId";
            $result = read($query);            
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>

