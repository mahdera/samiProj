<?php
    require_once 'dbconnection.php';
    
    function saveAssessment($assessmentType, $assessmentDate, $summary){
        try{
            $query = "insert into tbl_assessment values (0,'$assessmentType', '$assessmentDate', '$summary')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
        
    function updateAssessment($id, $assessmentType, $assessmentDate, $summary){
        try{
            $query = "update tbl_assessment set assessment_type = '$assessmentType', assessment_date='$assessmentDate', summary='$summary' where id=$id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteAssessment($id){
        try{
            $query = "delete from tbl_assessment where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllAssessments(){
        try{
            $query = "select * from tbl_assessment";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAssessment($id){
        try{
            $query = "select * from tbl_assessment where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAssessmentUsing($assessmentType, $assessmentDate){
        try{
            $query = "select * from tbl_assessment where assessment_type = '$assessmentType' and assessment_date = '$assessmentDate'";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>

