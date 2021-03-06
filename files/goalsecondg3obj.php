<?php
    require_once 'dbconnection.php';
    
    function saveGoalSecondG3Obj($goalSecondG3Id, $obj, $modifiedBy){
        try{
            $query = "insert into tbl_goal_second_g3_obj values(0, $goalSecondG3Id, '$obj', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalSecondG3Obj($id, $goalSecondG3Id, $obj, $modifiedBy){
        try{
            $query = "update tbl_goal_second_g3_obj set goal_second_g3_id = $goalSecondG3Id, obj = '$obj', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteGoalSecondG3Obj($id){
        try{
            $query = "delete from tbl_goal_second_g3_obj where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalSecondG3Objs(){
        try{
            $query = "select * from tbl_goal_second_g3_obj";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllGoalSecondG3ObjsForThisGoalSecondG3Id($goalSecondG3Id){
        try{
            $query = "select * from tbl_goal_second_g3_obj where goal_second_g3_id = $goalSecondG3Id";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSecondG3ObjsForThisGoalSecondG3IdAndModifiedBy($goalSecondG3Id, $modifiedBy){
        try{
            $query = "select * from tbl_goal_second_g3_obj where goal_second_g3_id = $goalSecondG3Id and modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getGoalSecondG3Obj($id){
        try{
            $query = "select * from tbl_goal_second_g3_obj where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
