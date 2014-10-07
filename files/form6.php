<?php
    require_once 'dbconnection.php';
    
    function saveForm6($q6_1){
        try{
            $query = "insert into tbl_form_6 values(0, '$q6_1')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateForm6($id, $q6_1){
        try{
            $query = "update tbl_form_6 set q6_1 = '$q6_1' where id = $id";
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteForm6($id){
        try{
            $query = "delete from tbl_form_6 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllForm6s(){
        try{
            $query = "select * from tbl_form_6";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getForm6($id){
        try{
            $query = "select * from tbl_form_6 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
