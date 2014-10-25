<?php
    require_once 'dbconnection.php';

    function saveForm3($q3_1, $modifiedBy){
        try{
            $query = "insert into tbl_form_3 values(0, '$q3_1', $modifiedBy, NOW() )";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateForm3($id, $q3_1, $modifiedBy){
        try{
            $query = "update tbl_form_3 set q3_1 = '$q3_1', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteForm3($id){
        try{
            $query = "delete from tbl_form_3 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllForm3s(){
        try{
            $query = "select * from tbl_form_3";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getForm3($id){
        try{
            $query = "select * from tbl_form_3 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllForm3sModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_form_3 where modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getForm3ModifiedByUserOnThisDate($modifiedBy, $modificationDate){
        try{
            $query = "select * from tbl_form_3 where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
