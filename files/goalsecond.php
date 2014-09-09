<?php
    require_once 'dbconnection.php';
    
    function saveGoalSecond($fnId){
        try{
            $query = "insert into tbl_goal_second values(0, $fnId)";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalSecond($id, $fnId){
        try{
            $query = "update tbl_goal_second set fn_id = $fnId where id = $id";
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
            return $result;                    
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>

