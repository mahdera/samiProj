<?php
    require_once 'dbconnection.php';
    
    function saveGoalSecondG1Obj($goalSecondG1Obj, $obj){
        try{
            $query = "insert into tbl_goal_second_g1_obj values(0, $goalSecondG1Obj, '$obj')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalSecondG1Obj($id, $goalSecondG1Obj, $obj){
        try{
            $query = "update tbl_goal_second_g1_obj set goal_second_g1_obj = $goalSecondG1Obj, obj='$obj' where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteGoalSecondG1Obj($id){
        try{
            $query = "delete from tbl_goal_second_g1_obj where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalSecondG1Objs(){
        try{
            $query = "select * from tbl_goal_second_g1_obj";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getGoalSecondG1Obj($id){
        try{
            $query = "select * from tbl_goal_second_g1_obj where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
