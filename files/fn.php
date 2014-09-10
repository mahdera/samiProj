<?php
    require_once './dbconnection.php';
    
    function saveFn($fnName){
        try{
            $query = "insert into tbl_fn values(0, '$fnName')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateFn($id, $fnName){
        try{
            $query = "update tbl_fn set fn_name = '$fnName' where id = $id";
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
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>