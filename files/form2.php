<?php
    require_once 'dbconnection.php';
    
    function saveForm2($q2_1, $q2_2, $q2_3, $q2_4, $modifiedBy){
        try{
            $query = "insert into tbl_form_2 values(0,'$q2_1','$q2_2','$q2_3','$q2_4', $modifiedBy, NOW())";            
            //echo $query;
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateForm2($id, $q2_1, $q2_2, $q2_3, $q2_4, $modifiedBy){
        try{
            $query = "update tbl_form_2 set q2_1 = '$q2_1', q2_2 = '$q2_2', q2_3 = '$q2_3', q2_4 = '$q2_4', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            //echo $query;
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteForm2($id){
        try{
            $query = "delete from tbl_form_2 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllForm2s(){
        try{
            $query = "select * from tbl_form_2";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getForm2ModifiedByUserOnThisDate($modifiedBy, $modificationDate){
        try{
            $query = "select * from tbl_form_2 where modified_by = $modifiedBy and modification_date = '$modificationDate'";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getForm2($id){
        try{
            $query = "select * from tbl_form_2 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllForm2sModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_form_2 where modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>