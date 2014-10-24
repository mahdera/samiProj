<?php
    require_once 'dbconnection.php';

    function saveGoalSecondG1Obj($goalSecondG1Obj, $obj, $modifiedBy){
        try{
            $query = "insert into tbl_goal_second_g1_obj values(0, $goalSecondG1Obj, '$obj', $modifiedBy, NOW())";
            echo $query;
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateGoalSecondG1Obj($id, $goalSecondG1Obj, $obj, $modifiedBy){
        try{
            $query = "update tbl_goal_second_g1_obj set goal_second_g1_obj = $goalSecondG1Obj, obj='$obj', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
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

    function getAllGoalSecondG1ObjsForThisGoalSecondG1Id($goalSecondG1Id){
        try{
            $query = "select * from tbl_goal_second_g1_obj where goal_second_g1_id = $goalSecondG1Id";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSecondG1ObjsForThisGoalSecondG1IdAndModifiedBy($goalSecondG1Id, $modifiedBy){
        try{
            $query = "select * from tbl_goal_second_g1_obj where goal_second_g1_id = $goalSecondG1Id and modified_by = $modifiedBy";
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
