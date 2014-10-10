<?php
    require_once 'dbconnection.php';
    
    function saveFnAction($fnId, $actionText){
        try{
            $query = "insert into tbl_fn_action values(0, $fnId, '$actionText')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateFnAction($id, $actionText){
        try{
            $query = "update tbl_fn_action set action_text = '$actionText' where id = $id";
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
?>