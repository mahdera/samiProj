<?php
    require_once 'dbconnection.php';
    
    function saveForm10($q10_1, $modifiedBy){
        try{
            $query = "insert into tbl_form_10 values(0, '$q10_1', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateForm9($id, $q10_1, $modifiedBy){
        try{
            $query = "update tbl_form_10 set q10_1 = '$q10_1', modified_by = $modifiedBy, modification_date = 'NOW()' where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteForm10($id){
        try{
            $query = "delete from tbl_form_10 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllForm10s(){
        try{
            $query = "select * from tbl_form_10";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getForm10($id){
        try{
            $query = "select * from tbl_form_10 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
