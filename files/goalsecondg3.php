<?php
    require_once 'dbconnection.php';
    
    function saveGoalSecondG3($goalSecondId, $g3){
        try{
            $query = "insert into tbl_goal_second_g3 values(0, $goalSecondId, '$g3')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalSecondG3($id, $goalSecondId, $g3){
        try{
            $query = "update tbl_goal_second_g3 set goal_second_id = $goalSecondId, g3='$g3' where id = $id";
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
    
    function getGoalSecondG3($id){
        try{
            $query = "select * from tbl_goal_second_g3 where id = $id";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
