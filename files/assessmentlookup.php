<?php
    require_once 'dbconnection.php';

    function getAllAssessmentLookUpValues(){
        try{
            $query = "select * from tbl_assessment_lookup order by value asc";
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }
?>
