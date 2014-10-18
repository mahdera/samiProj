<?php
    require_once 'dbconnection.php';
    
    function saveGoalFirstG3ObjFn($goalFirstG3Id, $obj, $fn, $modifiedBy){
        try{
            $query = "insert into tbl_goal_first_g3_obj_fn values(0, $goalFirstG3Id, '$obj', $fn, $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalFirstG3ObjFn($id, $goalFirstG3Id, $obj, $fn, $modifiedBy){
        try{
            $query = "update tbl_goal_first_g3_obj_fn set goal_first_g3_id = $goalFirstG3Id, obj = '$obj', fn_id = $fn, modified_by = $modifiedBy, modification_date = NOW() where id = $id";
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
    
    function getAllGoalFirstG3ObjFnsForThisGoalFirstG3Id($goalFirstG3Id){
        try{
            $query = "select * from tbl_goal_first_g3_obj_fn where goal_first_g3_id = $goalFirstG3Id";
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
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalFirstG3ObjFnsForFn($fn_id){
        try{
            $query = "select * from tbl_goal_first_g3_obj_fn where fn_id = $fn_id";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
