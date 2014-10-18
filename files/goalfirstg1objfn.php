<?php
    require_once 'dbconnection.php';
    
    function saveGoalFirstG1ObjFn($goalFirstG1Id, $obj, $fn, $modifiedBy){
        try{
            $query = "insert into tbl_goal_first_g1_obj_fn values(0, $goalFirstG1Id, '$obj', $fn, $modifiedBy, NOW())";
            echo $query;
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalFirstG1ObjFn($id, $goalFirstG1Id, $obj, $fn, $modifiedBy){
        try{
            $query = "update tbl_goal_first_g1_obj_fn set  goal_first_g1_id = $goalFirstG1Id, obj = '$obj', fn = $fn, modified_by = $modifiedBy, modification_date = NOW() where id = $id";
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
    
    function getAllGoalFirstG1ObjFnsForThisGoalFirstG1Id($goalFirstG1Id){
        try{
            $query = "select * from tbl_goal_first_g1_obj_fn where goal_first_g1_id = $goalFirstG1Id";
            //echo $query;
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
    
    function getAllGoalFirstG1ObjFnsForFn($fn_id){
        try{
            $query = "select * from tbl_goal_first_g1_obj_fn where fn_id = $fn_id";
            //echo $query;
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>

