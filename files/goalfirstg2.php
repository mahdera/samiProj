<?php
    require_once 'dbconnection.php';
    
    function saveGoalFirstG2($goalFirstId, $g2, $fn){
        try{
            $query = "insert into tbl_goal_first_g2 values(0, $goalFirstId, '$g2', '$fn')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalFirstG2($id, $goalFirstId, $g2, $fn){
        try{
            $query = "update tbl_goal_first_g2 set goal_first_id = $goalFirstId, g2 = '$g2', fn = '$fn' where id = $id";
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
?>