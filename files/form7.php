<?php
    require_once 'dbconnection.php';
    
    function saveForm7($q7_1){
        try{
            $query = "insert into tbl_form_7 values(0, '$q7_1')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateForm7($id, $q7_1){
        try{
            $query = "update tbl_form_7 set q7_1 = '$q7_1' where id = $id";
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteForm6($id){
        try{
            $query = "delete from tbl_form_7 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllForm7s(){
        try{
            $query = "select * from tbl_form_7";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getForm7($id){
        try{
            $query = "select * from tbl_form_7 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
