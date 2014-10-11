<?php
    require_once 'dbconnection.php';
    
    function saveForm4($q4_1, $modifiedBy){
        try{
            $query = "insert into tbl_form_4 values(0, '$q4_1', $modifiedBy, 'NOW()')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateForm4($id, $q4_1, $modifiedBy){
        try{
            $query = "update tbl_form_4 set q4_1 = '$q4_1', modified_by = $modifiedBy, modification_date = 'NOW()' where id = $id";
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteForm4($id){
        try{
            $query = "delete from tbl_form_4 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllForm4s(){
        try{
            $query = "select * from tbl_form_4";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getForm4($id){
        try{
            $query = "select * from tbl_form_4 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
