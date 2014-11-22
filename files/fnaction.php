<?php
    require_once 'dbconnection.php';

    function saveFnAction($fnId, $actionText, $modifiedBy){
        try{
            $query = "insert into tbl_fn_action values(0, $fnId, '$actionText', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateFnAction($id, $actionText, $modifiedBy){
        try{
            $query = "update tbl_fn_action set action_text = '$actionText', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteFnAction($id){
        try{
            $query = "delete from tbl_fn_action where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllFnActions(){
        try{
            $query = "select * from tbl_fn_action";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllFnActionsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_fn_action where modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getFnAction($id){
        try{
            $query = "select * from tbl_fn_action where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function doesThisFnAlreadyActionFilledForIt($fnId){
        try{
            $query = "select count(*) as cnt from tbl_fn_action where fn_id = $fnId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow->cnt;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function doesThisFnAlreadyActionFilledForItByUser($fnId, $modifiedBy){
        try{
            $query = "select count(*) as cnt from tbl_fn_action where fn_id = $fnId and modified_by = $modifiedBy";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow->cnt;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllFnActionsForThisFn($fnId){
        try{
            $query = "select * from tbl_fn_action where fn_id = $fnId";
            //echo $query;
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllFnActionsForThisFnModifiedBy($fnId, $modifiedBy){
        try{
            $query = "select * from tbl_fn_action where fn_id = $fnId and modified_by = $modifiedBy";
            //echo $query;
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
