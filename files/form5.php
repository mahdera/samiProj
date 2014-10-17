<?php
    require_once 'dbconnection.php';
    
    function saveForm5($q5_1, $modifiedBy){
        try{
            $query = "insert into tbl_form_5 values(0, '$q5_1', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateForm5($id, $q5_1, $modifiedBy){
        try{
            $query = "update tbl_form_5 set q5_1 = '$q5_1', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteForm5($id){
        try{
            $query = "delete from tbl_form_5 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllForm5s(){
        try{
            $query = "select * from tbl_form_5";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getForm5($id){
        try{
            $query = "select * from tbl_form_5 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllForm5sModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_form_5 where modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
