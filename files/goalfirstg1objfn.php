<?php
    require_once 'dbconnection.php';
    
    function saveGoalFirstG1ObjFn($goalFirstG1Id, $obj, $fn){
        try{
            $query = "insert into tbl_goal_first_g1_obj_fn values(0, $goalFirstG1Id, '$obj', '$fn')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalFirstG1ObjFn($id, $goalFirstG1Id, $obj, $fn){
        try{
            $query = "update tbl_goal_first_g1_obj_fn set  goal_first_g1_id = $goalFirstG1Id, obj = '$obj', fn = '$fn' where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteGoalFirstG1ObjFn($id){
        try{
            $query = "delete from tbl_goal_first_g1_obj_fn where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalFirstG1ObjFns(){
        try{
            $query = "select * from tbl_goal_first_g1_obj_fn";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getGoalFirstG1ObjFn($id){
        try{
            $query = "select * from tbl_goal_first_g1_obj_fn where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>

