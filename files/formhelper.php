<?php
    @session_start();
    require_once 'dbconnection.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    function doesThisFormAlreadyHasRecordAttachedToIt($formNum){
        $cntVal = 0;
        $userObj = getUser($_SESSION['LOGGED_USER_ID']);
        $tableName = "tbl_form_" . $formNum;
        try{
            if($userObj->user_level == '02'){
                $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                $divisionId = $userSubDistrictObj->sub_district_id;
                $query = "SELECT COUNT(*) AS cnt FROM $tableName, tbl_user_sub_district WHERE " .
                "$tableName.modified_by = tbl_user_sub_district.user_id AND tbl_user_sub_district.sub_district_id = $divisionId";
            }else if($userObj->user_level == '01'){
                $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                if(!empty($userObject)){
                    $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
                    $divisionId = $userSubDistrictObj->sub_district_id;
                    $query = "SELECT COUNT(*) AS cnt FROM $tableName, tbl_user_sub_district WHERE " .
                    "$tableName.modified_by = tbl_user_sub_district.user_id AND tbl_user_sub_district.sub_district_id = $divisionId";
                }
            }
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            $cntVal = $resultRow->cnt;
        }catch(Exception $ex){
            $ex->getMessage();
        }
        return $cntVal;
    }
?>
