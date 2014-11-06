<?php
    require_once 'dbconnection.php';

    function saveGoalFirst($modifiedBy){
        try{
            $query = "insert into tbl_goal_first values(0, $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateGoalFirst($id,$modifiedBy){
        try{
            $query = "update tbl_goal_first set modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteGoalFirst($id){
        try{
            $query = "delete from tbl_goal_first where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirsts(){
        try{
            $query = "select * from tbl_goal_first";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_goal_first where modified_by = $modifiedBy order by modification_date desc";
            //echo $query;
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirst($id){
        try{
            $query = "select * from tbl_goal_first where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstUsingModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_goal_first where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    /*function getGoalFirstUsingThId($thId){
        try{
            $query = "select * from tbl_goal_first where th_id = $thId";
            //echo $query;
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstUsingThIdAndModifiedBy($thId, $modifiedBy){
        try{
            $query = "select * from tbl_goal_first where th_id = $thId and modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstsUsingThId($thId){
        try{
            $query = "select * from tbl_goal_first where th_id = $thId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllThsForGoalFirst($goalFirstId){
        try{
            $query = "select tbl_th.id, tbl_th.th_name, tbl_th.modified_by, tbl_th.modification_date from tbl_th,tbl_goal_first where tbl_th.id = tbl_goal_first.th_id and tbl_goal_first.id = $goalFirstId";
            //echo $query;
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }*/
?>
