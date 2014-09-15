<?php
    require_once 'dbconnection.php';
    
    function saveGoalFirst($thId){
        try{
            $query = "insert into tbl_goal_first values(0, $thId)";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalFirst($id, $thId){
        try{
            $query = "update tbl_goal_first set th_id = $thId where id = $id";
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
            //echo $query;
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
