<?php
    require_once 'dbconnection.php';
    
    function saveGoalSecondG1($goalSecondId, $g1){
        try{
            $query = "insert into tbl_goal_second_g1 values(0, $goalSecondId, '$g1')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalSecondG1($id, $goalSecondId, $g1){
        try{
            $query = "update tbl_goal_second_g1 set goal_second_id = $goalSecondId, g1 = '$g1' where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteGoalSecondG1($id){
        try{
            $query = "delete from tbl_goal_second_g1 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalSecondG1s(){
        try{
            $query = "select * from tbl_goal_second_g1";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getGoalSecondG1($id){
        try{
            $query = "select * from tbl_goal_second_g1 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
