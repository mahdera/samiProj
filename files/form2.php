<?php
    require_once 'dbconnection.php';
    
    function saveForm2($q2_1, $q2_2, $q2_3, $q2_4){
        try{
            $query = "insert into tbl_form_2 values(0,'$q2_1','$q2_2','$q2_3','$q2_4')";            
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateForm2($id, $q2_1, $q2_2, $q2_3, $q2_4){
        try{
            $query = "update tbl_form_2 set q2_1 = '$q2_1', q2_2 = '$$q2_2', q_3 = '$q2_3', q_4 = '$q2_4' where id = $id";
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
?>