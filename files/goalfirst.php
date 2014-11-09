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
            $query = "select * from tbl_goal_first where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getDateDifferenceForGoalFirstUsingModifiedBy($modifiedBy){
        try{
            $query = "select DATEDIFF(modification_date, NOW()) as dateDiff from tbl_goal_first where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            if(mysql_num_rows($result)){
                $resultRow = mysql_fetch_object($result);
                return abs($resultRow->dateDiff);
            }
        }catch(Exception $ex){
            $ex->getMessage();
        }
        return false;
    }
?>
