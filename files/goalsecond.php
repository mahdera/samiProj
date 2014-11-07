<?php
    require_once 'dbconnection.php';

    function saveGoalSecond($modifiedBy){
        try{
            $query = "insert into tbl_goal_second values(0, $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateGoalSecond($id, $modifiedBy){
        try{
            $query = "update tbl_goal_second set modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteGoalSecond($id){
        try{
            $query = "delete from tbl_goal_second where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSeconds(){
        try{
            $query = "select * from tbl_goal_second";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSecondsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_goal_second where modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecond($id){
        try{
            $query = "select * from tbl_goal_second where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getLatestTopGoalSecondModifiedBy($modifiedBy){
      try{
        $query = "select * from tbl_goal_second where modified_by = $modifiedBy order by modification_date limit 0,1";
        $result = read($query);
        $resultRow = mysql_fetch_object($result);
        return $resultRow;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }
?>
