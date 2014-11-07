<?php
    require_once 'dbconnection.php';

    function saveGoalFirstG3($goalFirstThId, $g3, $fn, $modifiedBy){
        try{
            $query = "insert into tbl_goal_first_g3 values(0, $goalFirstThId, '$g3', $fn, $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateGoalFirstG3($id, $goalFirstThId, $g3, $fn, $modifiedBy){
        try{
            $query = "update tbl_goal_first_g3 set goal_first_th_id = $goalFirstThId, g3='$g3', fn_id = $fn, modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteGoalFirstG3($id){
        try{
            $query = "delete from tbl_goal_first_g3 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstG3s(){
        try{
            $query = "select * from tbl_goal_first_g3";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstG3ForThisGoalFirstThId($goalFirstThId){
        try{
            $query = "select * from tbl_goal_first_g3 where goal_first_th_id = $goalFirstThId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstG3ForThisGoalFirstThIdAndModifiedBy($goalFirstThId, $modifiedBy){
        try{
            $query = "select * from tbl_goal_first_g3 where goal_first_th_id = $goalFirstThId and modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstG3($id){
        try{
            $query = "select * from tbl_goal_first_g3 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstG3Using($goalFirstThId, $g3, $g3Fn){
        try{
            $query = "select * from tbl_goal_first_g3 where goal_first_th_id = $goalFirstThId and g3 = '$g3' and fn_id = $g3Fn";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstG3UsingAndModifiedBy($goalFirstThId, $g3, $g3Fn, $modifiedBy){
        try{
            $query = "select * from tbl_goal_first_g3 where goal_first_th_id = $goalFirstThId and g3 = '$g3' and fn_id = $g3Fn and modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstG3ForGoalFirst($goalFirstThId){
        try{
            $query = "select * from tbl_goal_first_g3 where goal_first_th_id = $goalFirstThId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalFirstG3ForGoalFirstId($goalFirstId){
        try{
            $query = "select * from tbl_goal_first_g3 where goal_first_th_id = $goalFirstThId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalFirstG3ForGoalFirstThId($goalFirstThId){
        try{
            $query = "select * from tbl_goal_first_g3 where goal_first_th_id = $goalFirstThId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }
?>
