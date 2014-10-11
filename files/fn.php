<?php
    require_once 'dbconnection.php';
    
    function saveFn($fnName, $modifiedBy){
        try{
            $query = "insert into tbl_fn values(0, '$fnName', $modifiedBy, 'NOW()')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateFn($id, $fnName, $modifiedBy){
        try{
            $query = "update tbl_fn set fn_name = '$fnName', modified_by = $modifiedBy, modification_date = 'NOW()' where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteFn($id){
        try{
            $query = "delete from tbl_fn where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllFns(){
        try{
            $query = "select * from tbl_fn order by fn_name";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getFn($id){
        try{
            $query = "select * from tbl_fn where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
