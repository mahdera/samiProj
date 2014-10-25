<?php
    require_once 'dbconnection.php';

    function saveTh($thName, $modifiedBy){
        try{
            $query = "insert into tbl_th values(0, '$thName', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateTh($id, $thName, $modifiedBy){
        try{
            $query = "update tbl_th set th_name = '$thName', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteTh($id){
        try{
            $query = "delete from tbl_th where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllThs(){
        try{
            $query = "select * from tbl_th order by th_name";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllThsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_th where modified_by = $modifiedBy order by th_name";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllThsForThisAssessment($assessmentId){
        try{
            $query = "select tbl_th.* from tbl_th, tbl_assessment_th where tbl_th.id = tbl_assessment_th.th_id and tbl_assessment_th.assessment_id = $assessmentId";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getTh($id){
        try{
            $query = "select * from tbl_th where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getThByIdAndModifiedBy($id, $modifiedBy){
        try{
            $query = "select * from tbl_th where id = $id and modified_by = $modifiedBy";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getThUsing($thName){
        try{
            $query = "select * from tbl_th where th_name = '$thName'";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

?>
