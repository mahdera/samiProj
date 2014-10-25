<?php
    require_once 'dbconnection.php';

    function saveForm8($q8_1, $modifiedBy){
        try{
            $query = "insert into tbl_form_8 values(0, '$q8_1', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateForm8($id, $q8_1, $modifiedBy){
        try{
            $query = "update tbl_form_8 set q8_1 = '$q8_1', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
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

    function getAllForm8sModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_form_8 where modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getForm8ModifiedByUserOnThisDate($modifiedBy, $modificationDate){
        try{
            $query = "select * from tbl_form_8 where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
