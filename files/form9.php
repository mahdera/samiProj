<?php
    require_once 'dbconnection.php';
    
    function saveForm9($q9_1){
        try{
            $query = "insert into tbl_form_9 values(0, '$q9_1')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateForm9($id, $q9_1){
        try{
            $query = "update tbl_form_9 set q9_1 = '$q9_1' where id = $id";
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteForm9($id){
        try{
            $query = "delete from tbl_form_9 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllForm9s(){
        try{
            $query = "select * from tbl_form_9";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getForm9($id){
        try{
            $query = "select * from tbl_form_9 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
