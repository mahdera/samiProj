<?php
    require_once 'dbconnection.php';

    function saveGoalFirstG1($goalFirstThId, $g1, $fn, $modified_by){
        try{
            $query = "insert into tbl_goal_first_g1 values(0, $goalFirstThId, '$g1', $fn, $modified_by, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateGoalFirstG1($id, $goalFirstThId, $g1, $fn, $modifiedBy){
        try{
            $query = "update tbl_goal_first_g1 set goal_first_th_id = $goalFirstThId, g1 = '$g1', fn_id = $fn, modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteGoalFirstG1($id){
        try{
            $query = "delete from tbl_goal_first_g1 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstG1s(){
        try{
            $query = "select * from tbl_goal_first_g1";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstG1ForThisGoalFirstThId($goalFirstThId){
        try{
            $query = "select * from tbl_goal_first_g1 where goal_first_th_id = $goalFirstThId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstG1ForThisGoalFirstThIdAndModifiedBy($goalFirstThId, $modifiedBy){
        try{
            $query = "select * from tbl_goal_first_g1 where goal_first_th_id = $goalFirstThId and modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstG1($id){
        try{
            $query = "select * from tbl_goal_first_g1 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstG1Using($goalFirstThId, $g1, $g1Fn){
        try{
            $query = "select * from tbl_goal_first_g1 where goal_first_th_id = $goalFirstThId and g1 = '$g1' and fn_id = $g1Fn";
            //echo $query;
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstG1UsingAndModifiedBy($goalFirstThId, $g1, $g1Fn, $modifiedBy){
        try{
            $query = "select * from tbl_goal_first_g1 where goal_first_th_id = $goalFirstThId and g1 = '$g1' and fn_id = $g1Fn and modified_by = $modifiedBy order by modification_date desc limit 0,1";
            echo $query;
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstG1ForGoalFirstTh($goalFirstThId){
        try{
            $query = "select * from tbl_goal_first_g1 where goal_first_th_id = $goalFirstThId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstG1ForGoalFirstId($goalFirstId){
        try{
            $query = "select * from tbl_goal_first_g1 where goal_first_id = $goalFirstId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstG1ForGoalFirstThId($goalFirstThId){
        try{
            $query = "select * from tbl_goal_first_g1 where goal_first_th_id = $goalFirstThId";
            //echo $query;
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }
?>
