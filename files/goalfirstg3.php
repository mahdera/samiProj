<?php
    require_once 'dbconnection.php';
    
    function saveGoalFirstG3($goalFirstId, $g3, $fn){
        try{
            $query = "insert into tbl_goal_first_g3 values(0, $goalFirstId, '$g3', '$fn')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateGoalFirstG3($id, $goalFirstId, $g3, $fn){
        try{
            $query = "update tbl_goal_first_g3 set goal_first_id = $goalFirstId, g3='$g3', fn='$fn' where id = $id";
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
    
    function getAllGoalFirstG3ForThisGoalFirstId($goalFirstId){
        try{
            $query = "select * from tbl_goal_first_g3 where goal_first_id = $goalFirstId";
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
    
    function getGoalFirstG3Using($goalFirstId, $g3, $g3Fn){
        try{
            $query = "select * from tbl_goal_first_g3 where goal_first_id = $goalFirstId and g3 = '$g3' and fn = '$g3Fn'";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
