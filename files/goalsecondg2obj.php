<?php
    require_once 'dbconnection.php';
    
    function saveGoalSecondG2Obj($goalSecondG2Id, $obj){
        try{
            $query = "insert into tbl_goal_second_g2_obj values(0, $goalSecondG2Id, '$obj')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalSecondG2Obj($id, $goalSecondG2Id, $obj){
        try{
            $query = "update tbl_goal_second_g2_obj set goal_second_g2_id = $goalSecondG2Id, obj = '$obj' where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteGoalSecondG2Obj($id){
        try{
            $query = "delete from tbl_goal_second_g2_obj where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalSecondG2Objs(){
        try{
            $query = "select * from tbl_goal_second_g2_obj";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalSecondG2ObjsForThisGoalSecondG2Id($goalSecondG2Id){
        try{
            $query = "select * from tbl_goal_second_g2_obj where goal_second_g2_id = $goalSecondG2Id";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getGoalSecondG2Obj($id){
        try{
            $query = "select * from tbl_goal_second_g2_obj where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
