<?php
    require_once 'dbconnection.php';

    function saveGoalSecond($modifiedBy){
        try{
            $query = "insert into tbl_goal_second values(0, $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateGoalSecond($id, $modifiedBy){
        try{
            $query = "update tbl_goal_second set modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteGoalSecond($id){
        try{
            $query = "delete from tbl_goal_second where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSeconds(){
        try{
            $query = "select * from tbl_goal_second";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllGoalSecondsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_goal_second where modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getGoalSecond($id){
        try{
            $query = "select * from tbl_goal_second where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getLatestTopGoalSecondModifiedBy($modifiedBy){
      try{
        $query = "select * from tbl_goal_second where modified_by = $modifiedBy order by modification_date desc limit 0,1";
        $result = read($query);
        $resultRow = mysql_fetch_object($result);
        return $resultRow;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getGoalSecondUsingModifiedByUsingUserLevel($userLevel, $divisionId){
        try{
          $query = null;
          if($userLevel == '02'){
            $query = "select tbl_goal_second.* from tbl_goal_second, tbl_user_sub_district where tbl_goal_second.modified_by = " .
            "tbl_user_sub_district.user_id and tbl_user_sub_district.sub_district_id = $divisionId order by tbl_goal_second.modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
          }else if($userLevel == '01'){
            //if district level fetching is required in the future...code goes here
          }
        }catch(Exception $ex){
          $ex->getMessage();
        }
    }

    function getGoalSecondUsingModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_goal_second where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getTheLatestGoalSecondRecordModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_goal_second where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getDateDifferenceForGoalSecondUsingModifiedBy($modifiedBy){
        try{
            $query = "select DATEDIFF(modification_date, NOW()) as dateDiff from tbl_goal_second where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            if(mysql_num_rows($result)){
                $resultRow = mysql_fetch_object($result);
                //echo $resultRow->dateDiff;
                return abs($resultRow->dateDiff);
            }
        }catch(Exception $ex){
            $ex->getMessage();
        }
        return false;
    }

    function getDateDifferenceForGoalSecondUsingModifiedByUsingUserLevel($userLevel, $divisionId){
      $query = null;
      try{
        if($userLevel == '02'){
          $query = "select DATEDIFF(tbl_goal_second.modification_date, NOW()) as dateDiff from tbl_goal_second, tbl_user_sub_district where tbl_goal_second.modified_by = tbl_user_sub_district.user_id and tbl_user_sub_district.sub_district_id = $divisionId order by modification_date desc limit 0,1";
        }else if($userLevel == '01'){
          //if there is a lenghty sql command is needed for district level..which i don't think so...
        }
        $result = read($query);
        if(mysql_num_rows($result)){
          $resultRow = mysql_fetch_object($result);
          //echo $resultRow->dateDiff;
          return abs($resultRow->dateDiff);
        }
      }catch(Exception $ex){
        $ex->getMessage();
      }
      return false;
    }
?>
