<?php
    require_once 'dbconnection.php';

    function saveForm1Q4($form1Id, $row, $col, $columnValue, $modifiedBy){
        try{
            $query = "insert into tbl_form_1_q4 values(0, $form1Id, $row, $col, '$columnValue', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateForm1Q4($id, $columnValue, $modifiedBy){
        try{
            $query = "update tbl_form_1_q4 set column_value = '$columnValue', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
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

    function getAllForm1Q4ForThisForm1($form1Id){
        try{
            $query = "select * from tbl_form_1_q4 where form_1_id = $form1Id order by row, col";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function clearQ4ValuesForForm1($form1Id){
        try{
            $query = "delete from tbl_form_1_q4 where form_1_id = $form1Id";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }
?>
