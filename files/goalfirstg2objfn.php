<?php
    require_once 'dbconnection.php';
    
    function saveGoalFirstG2ObjFn($goalFirstG2Id, $obj, $fn){
        try{
            $query = "insert into tbl_goal_first_g2_obj_fn values(0, $goalFirstG2Id, '$obj', $fn)";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalFirstG2ObjFn($id, $goalFirstG2Id, $obj, $fn){
        try{
            $query = "update tbl_goal_first_g2_obj_fn set goal_first_g2_id = $goalFirstG2Id, obj = '$obj', fn=$fn where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteGoalFirstG2ObjFn($id){
        try{
            $query = "delete from tbl_goal_first_g2_obj_fn where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalFirstG2ObjFns(){
        try{
            $query = "select * from tbl_goal_first_g2_obj_fn";
            $result = read($query);
            return $result;          
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalFirstG2ObjFnsForThisGoalFirstG2Id($goalFirstG2Id){
        try{
            $query = "select * from tbl_goal_first_g2_obj_fn where goal_first_g2_id = $goalFirstG2Id";
            $result = read($query);
            return $result;          
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getGoalFirstG2ObjFn($id){
        try{
            $query = "select * from tbl_goal_first_g2_obj_fn where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalFirstG2ObjFnsForFn($fn_id){
        try{
            $query = "select * from tbl_goal_first_g2_obj_fn where fn_id = $fn_id";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>