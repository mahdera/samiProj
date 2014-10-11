<?php
    require_once 'dbconnection.php';
    
    function saveGoalFirstG1($goalFirstId, $g1, $fn, $modified_by){
        try{
            $query = "insert into tbl_goal_first_g1 values(0, $goalFirstId, '$g1', $fn, $modified_by, 'NOW()')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalFirstG1($id, $goalFirstId, $g1, $fn, $modifiedBy){
        try{
            $query = "update tbl_goal_first_g1 set goal_first_id = $goalFirstId, g1 = '$g1', fn = $fn, modified_by = $modifiedBy, modification_date = 'NOW()' where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteGoalFirstG1($id){
        try{
            $query = "delete from tbl_goal_first_g1 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalFirstG1s(){
        try{
            $query = "select * from tbl_goal_first_g1";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalFirstG1ForThisGoalFirstId($goalFirstId){
        try{
            $query = "select * from tbl_goal_first_g1 where goal_first_id = $goalFirstId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getGoalFirstG1($id){
        try{
            $query = "select * from tbl_goal_first_g1 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getGoalFirstG1Using($goalFirstId, $g1, $g1Fn){
        try{
            $query = "select * from tbl_goal_first_g1 where goal_first_id = $goalFirstId and g1 = '$g1' and fn = $g1Fn";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getGoalFirstG1ForGoalFirst($goalFirstId){
        try{
            $query = "select * from tbl_goal_first_g1 where goal_first_id = $goalFirstId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
