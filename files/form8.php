<?php
    require_once 'dbconnection.php';
    
    function saveForm8($q8_1){
        try{
            $query = "insert into tbl_form_8 values(0, '$q8_1')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateForm8($id, $q8_1){
        try{
            $query = "update tbl_form_8 set q8_1 = '$q8_1' where id = $id";
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteForm8($id){
        try{
            $query = "delete from tbl_form_8 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllForm8s(){
        try{
            $query = "select * from tbl_form_8";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getForm8($id){
        try{
            $query = "select * from tbl_form_8 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
