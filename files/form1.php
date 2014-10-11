<?php
    require_once 'dbconnection.php';
    
    function saveForm1($title, $form_date, $plan, $q1, $q2, $modifiedBy){
        try{
            $query = "insert into tbl_form_1 values(0,'$title','$form_date', '$plan', '$q1','$q2', $modifiedBy, NOW())";            
            //echo $query;
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateForm1($id, $title, $form_date, $plan, $q1, $q2, $modifiedBy){
        try{
            $query = "update tbl_form_1 set title = '$title', form_date = '$form_date', plan='$plan', q1 = '$q1', q2 = '$q2', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteForm1($id){
        try{
            $query = "delete from tbl_form_1 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllForm1s(){
        try{
            $query = "select * from tbl_form_1";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getForm1($id){
        try{
            $query = "select * from tbl_form_1 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getForm1Using($title, $form_date){
        try{
            $query = "select * from tbl_form_1 where title = '$title' and form_date = '$form_date'";
            echo $query;
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>