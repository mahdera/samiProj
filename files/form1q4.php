<?php
    require_once 'dbconnection.php';
    
    function saveForm1Q4($form_1_id, $col1, $col2, $col3, $col4, $col5, $col6){
        try{
            $query = "insert into tbl_form_1_q4 values(0,'$form_1_id','$col1','$col2','$col3', '$col4', '$col5', '$col6')";            
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateForm1Q4($id, $col1, $col2, $col3, $col4, $col5, $col6){
        try{
            $query = "update tbl_form_1_q4 set col1 = '$col1', col2 = '$col2', col3 = '$col3', col4 = '$col4', col5='$col5', col6='$col6' where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteForm1Q4($id){
        try{
            $query = "delete from tbl_form_1_q4 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllForm1Q4s(){
        try{
            $query = "select * from tbl_form_1_q4";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getForm1Q4($id){
        try{
            $query = "select * from tbl_form_1_q4 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>