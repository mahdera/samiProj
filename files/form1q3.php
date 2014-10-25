<?php
    require_once 'dbconnection.php';

    function saveForm1Q3($form_1_id, $col1, $col2, $col3, $col4, $col5, $col6, $modifiedBy){
        try{
            $col1 = mysql_real_escape_string($col1);
            $col2 = mysql_real_escape_string($col2);
            $col3 = mysql_real_escape_string($col3);
            $col4 = mysql_real_escape_string($col4);
            $col5 = mysql_real_escape_string($col5);
            $col6 = mysql_real_escape_string($col6);
            echo $query;
            $query = "insert into tbl_form_1_q3 values(0,'$form_1_id','$col1','$col2','$col3', '$col4', '$col5', '$col6', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateForm1Q3($id, $col1, $col2, $col3, $col4, $col5, $col6, $modifiedBy){
        try{
            $col1 = mysql_real_escape_string($col1);
            $col2 = mysql_real_escape_string($col2);
            $col3 = mysql_real_escape_string($col3);
            $col4 = mysql_real_escape_string($col4);
            $col5 = mysql_real_escape_string($col5);
            $col6 = mysql_real_escape_string($col6);
            $query = "update tbl_form_1_q3 set col1 = '$col1', col2 = '$col2', col3 = '$col3', col4 = '$col4', col5='$col5', col6='$col6', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteForm1Q3($id){
        try{
            $query = "delete from tbl_form_1_q3 where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllForm1Q3s(){
        try{
            $query = "select * from tbl_form_1_q3";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getForm1Q3($id){
        try{
            $query = "select * from tbl_form_1_q3 where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllForm1Q3ForThisForm1($form1Id){
        try{
            $query = "select * from tbl_form_1_q3 where form_1_id = $form1Id";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
