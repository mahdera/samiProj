<?php
    require_once 'dbconnection.php';

    function saveAssessment($assessmentType, $assessmentDate, $summary, $modifiedBy){
        try{
            $query = "insert into tbl_assessment values (0,'$assessmentType', '$assessmentDate', '$summary', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }


    function updateAssessment($id, $assessmentType, $assessmentDate, $summary, $modifiedBy){
        try{
            $query = "update tbl_assessment set assessment_type = '$assessmentType', assessment_date='$assessmentDate', summary='$summary', modified_by = $modifiedBy, modification_date = NOW() where id=$id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteAssessment($id){
        try{
            $query = "delete from tbl_assessment where id = $id";
            //echo $query;
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

    function getAllAssessmentsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_assessment where modified_by = $modifiedBy";
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

    function getAllAssessmentsModifiedByUsingUserLevel($userLevel, $divisionId){
        try{
            $query = null;
            if($userLevel == '02'){
                $query = "select tbl_assessment.* from tbl_assessment, tbl_user_sub_district where " .
                "tbl_assessment.modified_by = tbl_user_sub_district.user_id and " .
                "tbl_user_sub_district.sub_district_id = $divisionId order by modification_date desc";
            }else if($userLevel == '01'){
                $query = "select tbl_assessment.* from tbl_assessment, tbl_user_zone " .
                "where tbl_assessment.modified_by = tbl_user_zone.user_id and " .
                "tbl_user_zone.zone_id = $divisionId  UNION select tbl_assessment.* from tbl_assessment, tbl_user_branch, tbl_branch " .
                "where tbl_assessment.modified_by = tbl_user_branch.user_id and ".
                "tbl_user_branch.branch_id = tbl_branch.id and tbl_branch.zone_id = $divisionId order by modification_date desc";
            }
            //echo $query;
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }
?>
