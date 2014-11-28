<?php

    require_once 'dbconnection.php';

    function saveRisk($thId, $mg, $dr, $pr, $wa, $rs, $modifiedBy){
        try{
            $query = "insert into tbl_risk values(0, $thId, '$mg', '$dr', '$pr', '$wa', '$rs', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateRisk($id, $thId, $mg, $dr, $pr, $wa, $rs, $modifiedBy){
        try{
            $query = "update tbl_risk set th_id = $thId, mg = '$mg', dr = '$dr', pr = '$pr', wa = '$wa', rs = '$rs', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            //echo $query;
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteRisk($id){
        try{
            $query = "delete from tbl_risk where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllRisks(){
        try{
            $query = "select * from tbl_risk";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllRisksModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_risk where modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getRisk($id){
        try{
            $query = "select * from tbl_risk where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllRisksModifiedByUsingUserLevel($userLevel, $divisionId){
        try{
            $query = null;
            if($userLevel == '02'){
                $query = "select tbl_risk.* from tbl_risk, tbl_user_sub_district where " .
                "tbl_risk.modified_by = tbl_user_sub_district.user_id and " .
                "tbl_user_sub_district.sub_district_id = $divisionId order by modification_date desc";
            }else if($userLevel == 'Zone Level'){
                $query = "select tbl_risk.* from tbl_risk, tbl_user_zone " .
                "where tbl_risk.modified_by = tbl_user_zone.user_id and " .
                "tbl_user_zone.zone_id = $divisionId  UNION select tbl_risk.* from tbl_risk, tbl_user_branch, tbl_branch " .
                "where tbl_risk.modified_by = tbl_user_branch.user_id and ".
                "tbl_user_branch.branch_id = tbl_branch.id and tbl_branch.zone_id = $divisionId order by modification_date desc";
            }
            //echo $query;
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function hasThisThBeenUsedForRiskByThisUser($thId, $modifiedBy){
      $cntVal = 0;
      try{
          $query = "select count(*) as cnt from tbl_risk where th_id = $thId and modified_by = $modifiedBy";
          $result = read($query);
          $resultRow = mysql_fetch_object($result);
          $cntVal = $resultRow->cnt;
          if($cntVal != 0)
              return true;
          else
              return false;
      }catch(Exception $ex){
          $ex->getMessage();
      }
    }

    /*
    if($userLevel = '02'){
    $query = "select count(*) as cnt from tbl_goal_first_th, tbl_user_sub_district where th_id = $thId and " .
    "tbl_goal_first_th.modified_by = tbl_user_sub_district.user_id and tbl_user_sub_district.sub_district_id = $divisionId";
    //echo $query;
  }
    */

    function hasThisThBeenUsedForRiskByThisUserUsingUserLevel($thId, $userLevel, $divisionId){
      $cntVal = 0;
      try{
        $query = null;
        if($userLevel = '02'){
          $query = "select count(*) as cnt from tbl_risk, tbl_user_sub_district where th_id = $thId and " .
          "tbl_risk.modified_by = tbl_user_sub_district.user_id and tbl_user_sub_district.sub_district_id = $divisionId";
        }
        $result = read($query);
        $resultRow = mysql_fetch_object($result);
        $cntVal = $resultRow->cnt;
        if($cntVal != 0)
        return true;
        else
        return false;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

?>
