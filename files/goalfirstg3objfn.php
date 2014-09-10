<?php
    require_once 'dbconnection.php';
    
    function saveGoalFirstG3ObjFn($goalFirstG3Id, $obj, $fn){
        try{
            $query = "insert into tbl_goal_first_g3_obj_fn values(0, $goalFirstG3Id, '$obj', '$fn')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalFirstG3ObjFn($id, $goalFirstG3Id, $obj, $fn){
        try{
            $query = "update tbl_goal_first_g3_obj_fn set goal_first_g3_id = $goalFirstG3Id, obj = '$obj', fn='$fn' where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteGoalFirstG3ObjFn($id){
        try{
            $query = "delete from tbl_goal_first_g3_obj_fn where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalFirstG3ObjFns(){
        try{
            $query = "select * from tbl_goal_first_g3_obj_fn";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getGoalFirstG3ObjFn($id){
        try{
            $query = "select * from tbl_goal_first_g3_obj_fn where id = $id";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
