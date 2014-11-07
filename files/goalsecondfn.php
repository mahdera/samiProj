<?php
    require_once 'dbconnection.php';

    function saveGoalSecondFn($goalSecondId, $fnId, $modifiedBy){
        try{
            $query = "insert into tbl_goal_second_fn values(0, $goalSecondId, $fnId, $modifiedBy, NOW())";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function updateGoalSecondFn($id, $goalSecondId, $fnId, $modifiedBy){
        try{
            $query = "update tbl_goal_second_fn set goal_second_id = $goalSecondId, fn_id = $fnId, modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function deleteGoalSecondFn($id){
        try{
            $query = "delete from tbl_goal_second_fn where id = $id";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllGoalSecondFns(){
        try{
            $query = "select * from tbl_goal_second_fn order by modification_date desc";
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getGoalSecondFn($id){
        try{
            $query = "select * from tbl_goal_second_fn where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($query);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getGoalSecondFnUsingModifiedyBy($modifiedBy){
        try{
            $query = "select * from tbl_goal_second_fn where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllGoalSecondFnsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_goal_second_fn where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getGoalSecondFnUsingFnId($fnId){
        try{
            $query = "select * from tbl_goal_second_fn where fn_id = $fnId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }
?>
