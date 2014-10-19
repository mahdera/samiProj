<?php
    require_once 'dbconnection.php';
    
    function saveGoalFirst($thId, $modifiedBy){
        try{
            $query = "insert into tbl_goal_first values(0, $thId, $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalFirst($id, $thId, $modifiedBy){
        try{
            $query = "update tbl_goal_first set th_id = $thId, modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteGoalFirst($id){
        try{
            $query = "delete from tbl_goal_first where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalFirsts(){
        try{
            $query = "select * from tbl_goal_first";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_goal_first where modified_by = $modifiedBy order by modification_date desc";
            //echo $query;
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getGoalFirst($id){
        try{
            $query = "select * from tbl_goal_first where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getGoalFirstUsingThId($thId){
        try{
            $query = "select * from tbl_goal_first where th_id = $thId";            
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstUsingThIdAndModifiedBy($thId, $modifiedBy){
        try{
            $query = "select * from tbl_goal_first where th_id = $thId and modified_by = $modifiedBy";            
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalFirstsUsingThId($thId){
        try{
            $query = "select * from tbl_goal_first where th_id = $thId";            
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllThsForGoalFirst($goalFirstId){
        try{
            $query = "select * from tbl_goal_first where id = $goalFirstId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
