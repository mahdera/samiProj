<?php
    require_once 'dbconnection.php';

    function saveGoalFirstTh($goalFirstId, $thId, $modifiedBy){
        try{
            $query = "insert into tbl_goal_first_th values(0, $goalFirstId, $thId, $modifiedBy, NOW())";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function updateGoalFirstTh($id, $goalFirstId, $thId, $modifiedBy){
        try{
            $query = "update tbl_goal_first_th set goal_first_id = $goalFirstId, th_id = $thId, modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function deleteGoalFirstTh($id){
        try{
            $query = "delete from tbl_goal_first_th where id = $id";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllGoalFirstThs(){
        try{
            $query = "select * from tbl_goal_first_th order by modification_date desc";
            $result = read($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getGoalFirstTh($id){
        try{
            $query = "select * from tbl_goal_first_th where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllGoalFirstThsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_goal_first_th where modified_by = $modifiedBy order by modification_date desc";            
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }
?>
