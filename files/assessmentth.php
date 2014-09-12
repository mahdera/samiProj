<?php
    require_once 'dbconnection.php';
    
    function saveAssessmentTh($assessmentId, $thId){
        try{
            $query = "insert into tbl_assessment_th values(0, $assessmentId, $thId)";
            //echo $query;
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateAssessmentTh($id, $assessmentId, $thId){
        try{
            $query = "update tbl_assessment_th set assessment_id = $assessmentId, th_id = $thId where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteAssessmentTh($id){
        try{
            $query = "delete from tbl_assessment_th where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllAssessmentThs(){
        try{
            $query = "select * from tbl_assessment_th";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAssessmentTh($id){
        try{
            $query = "select * from tbl_assessment_th where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
