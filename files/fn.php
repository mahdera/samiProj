<?php
    require_once 'dbconnection.php';

    function saveFn($fnName, $modifiedBy, $showAll){
        try{
            $query = "insert into tbl_fn values(0, '$fnName', $modifiedBy, NOW(), $showAll)";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateFn($id, $fnName, $modifiedBy){
        try{
            $query = "update tbl_fn set fn_name = '$fnName', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteFn($id){
        try{
            $query = "delete from tbl_fn where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllFns(){
        try{
            $query = "select * from tbl_fn order by fn_name";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllFnsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_fn where modified_by = $modifiedBy order by fn_name";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getFn($id){
        try{
            $query = "select * from tbl_fn where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllFnsModifiedByThisUser($modifiedBy){
        try{
            $query = "select * from tbl_fn where modified_by = $modifiedBy OR show_all = 1 order by fn_name";
            //echo $query;
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllFnsModifiedByUsingUserLevel($userLevel, $divisionId){
        try{
            $query = null;
            if($userLevel == 'Branch Level'){
                $query = "select tbl_fn.* from tbl_fn, tbl_user_branch where " .
                "tbl_fn.modified_by = tbl_user_branch.user_id and " .
                "tbl_user_branch.branch_id = $divisionId order by fn_name asc";
            }else if($userLevel == 'Zone Level'){
                $query = "select tbl_fn.* from tbl_fn, tbl_user_zone " .
                "where tbl_fn.modified_by = tbl_user_zone.user_id and " .
                "tbl_user_zone.zone_id = $divisionId  UNION select tbl_fn.* from tbl_fn, tbl_user_branch, tbl_branch " .
                "where tbl_fn.modified_by = tbl_user_branch.user_id and ".
                "tbl_user_branch.branch_id = tbl_branch.id and tbl_branch.zone_id = $divisionId order by fn_name asc";
            }
            //echo $query;
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllFilteredLatestFnIdsEnteredByUserUsingUserLevel($userLevel, $divisionId){
        $ctr = 0;
        $fnIdArray = array();
        $query = null;
        try{
            //first read from tbl_goal_first_g1
            if($userLevel == 'Branch Level'){
                $query = "select tbl_goal_first_g1.* from tbl_goal_first_g1, tbl_user_branch where " .
                "tbl_goal_first_g1.modified_by = tbl_user_branch.user_id and " .
                "tbl_user_branch.branch_id = $divisionId order by modification_date desc";
            }else if($userLevel == 'Zone Level'){
                $query = "select tbl_goal_first_g1.* from tbl_goal_first_g1, tbl_user_zone " .
                "where tbl_goal_first_g1.modified_by = tbl_user_zone.user_id and " .
                "tbl_user_zone.zone_id = $divisionId  UNION select tbl_goal_first_g1.* from tbl_goal_first_g1, tbl_user_branch, tbl_branch " .
                "where tbl_goal_first_g1.modified_by = tbl_user_branch.user_id and ".
                "tbl_user_branch.branch_id = tbl_branch.id and tbl_branch.zone_id = $divisionId order by modification_date desc";
            }
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //second read from tbl_goal_first_g1_obj_fn
            if($userLevel == 'Branch Level'){
                $query = "select tbl_goal_first_g1_obj_fn.* from tbl_goal_first_g1_obj_fn, tbl_user_branch where " .
                "tbl_goal_first_g1_obj_fn.modified_by = tbl_user_branch.user_id and " .
                "tbl_user_branch.branch_id = $divisionId order by modification_date desc";
            }else if($userLevel == 'Zone Level'){
                $query = "select tbl_goal_first_g1_obj_fn.* from tbl_goal_first_g1_obj_fn, tbl_user_zone " .
                "where tbl_goal_first_g1_obj_fn.modified_by = tbl_user_zone.user_id and " .
                "tbl_user_zone.zone_id = $divisionId  UNION select tbl_goal_first_g1_obj_fn.* from tbl_goal_first_g1_obj_fn, tbl_user_branch, tbl_branch " .
                "where tbl_goal_first_g1_obj_fn.modified_by = tbl_user_branch.user_id and ".
                "tbl_user_branch.branch_id = tbl_branch.id and tbl_branch.zone_id = $divisionId order by modification_date desc";
            }
            //$query = "select * from tbl_goal_first_g1_obj_fn where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //third read from tbl_goal_first_g2
            if($userLevel == 'Branch Level'){
                $query = "select tbl_goal_first_g2.* from tbl_goal_first_g2, tbl_user_branch where " .
                "tbl_goal_first_g2.modified_by = tbl_user_branch.user_id and " .
                "tbl_user_branch.branch_id = $divisionId order by modification_date desc";
            }else if($userLevel == 'Zone Level'){
                $query = "select tbl_goal_first_g2.* from tbl_goal_first_g2, tbl_user_zone " .
                "where tbl_goal_first_g2.modified_by = tbl_user_zone.user_id and " .
                "tbl_user_zone.zone_id = $divisionId  UNION select tbl_goal_first_g2.* from tbl_goal_first_g2, tbl_user_branch, tbl_branch " .
                "where tbl_goal_first_g2.modified_by = tbl_user_branch.user_id and ".
                "tbl_user_branch.branch_id = tbl_branch.id and tbl_branch.zone_id = $divisionId order by modification_date desc";
            }
            //$query = "select * from tbl_goal_first_g2 where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //fourth read from tbl_goal_first_g2_obj_fn
            if($userLevel == 'Branch Level'){
                $query = "select tbl_goal_first_g2_obj_fn.* from tbl_goal_first_g2_obj_fn, tbl_user_branch where " .
                "tbl_goal_first_g2_obj_fn.modified_by = tbl_user_branch.user_id and " .
                "tbl_user_branch.branch_id = $divisionId order by modification_date desc";
            }else if($userLevel == 'Zone Level'){
                $query = "select tbl_goal_first_g2_obj_fn.* from tbl_goal_first_g2_obj_fn, tbl_user_zone " .
                "where tbl_goal_first_g2_obj_fn.modified_by = tbl_user_zone.user_id and " .
                "tbl_user_zone.zone_id = $divisionId  UNION select tbl_goal_first_g2_obj_fn.* from tbl_goal_first_g2_obj_fn, tbl_user_branch, tbl_branch " .
                "where tbl_goal_first_g2_obj_fn.modified_by = tbl_user_branch.user_id and ".
                "tbl_user_branch.branch_id = tbl_branch.id and tbl_branch.zone_id = $divisionId order by modification_date desc";
            }
            //$query = "select * from tbl_goal_first_g2_obj_fn where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //fifth read from tbl_goal_first_g3
            if($userLevel == 'Branch Level'){
                $query = "select tbl_goal_first_g3.* from tbl_goal_first_g3, tbl_user_branch where " .
                "tbl_goal_first_g3.modified_by = tbl_user_branch.user_id and " .
                "tbl_user_branch.branch_id = $divisionId order by modification_date desc";
            }else if($userLevel == 'Zone Level'){
                $query = "select tbl_goal_first_g3.* from tbl_goal_first_g3, tbl_user_zone " .
                "where tbl_goal_first_g3.modified_by = tbl_user_zone.user_id and " .
                "tbl_user_zone.zone_id = $divisionId  UNION select tbl_goal_first_g3.* from tbl_goal_first_g3, tbl_user_branch, tbl_branch " .
                "where tbl_goal_first_g3.modified_by = tbl_user_branch.user_id and ".
                "tbl_user_branch.branch_id = tbl_branch.id and tbl_branch.zone_id = $divisionId order by modification_date desc";
            }
            //$query = "select * from tbl_goal_first_g3 where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //fourth read from tbl_goal_first_g3_obj_fn
            if($userLevel == 'Branch Level'){
                $query = "select tbl_goal_first_g3_obj_fn.* from tbl_goal_first_g3_obj_fn, tbl_user_branch where " .
                "tbl_goal_first_g3_obj_fn.modified_by = tbl_user_branch.user_id and " .
                "tbl_user_branch.branch_id = $divisionId order by modification_date desc";
            }else if($userLevel == 'Zone Level'){
                $query = "select tbl_goal_first_g3_obj_fn.* from tbl_goal_first_g3_obj_fn, tbl_user_zone " .
                "where tbl_goal_first_g3_obj_fn.modified_by = tbl_user_zone.user_id and " .
                "tbl_user_zone.zone_id = $divisionId  UNION select tbl_goal_first_g3_obj_fn.* from tbl_goal_first_g3_obj_fn, tbl_user_branch, tbl_branch " .
                "where tbl_goal_first_g3_obj_fn.modified_by = tbl_user_branch.user_id and ".
                "tbl_user_branch.branch_id = tbl_branch.id and tbl_branch.zone_id = $divisionId order by modification_date desc";
            }
            //$query = "select * from tbl_goal_first_g3_obj_fn where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
        }catch(Exception $ex){
            $ex->getMessage();
        }

        //before returning the array i need to check if there are duplicates and
        //leave out the duplicates...
        $fnIdArrayFiltered = array();

        //now check if the element already exists in the second newly created array
        $elementExists = false;
        for($i=0; $i<count($fnIdArray); $i++){
          for($j=0; $j<count($fnIdArrayFiltered);$j++){
            if($fnIdArray[$i] == $fnIdArrayFiltered[$j]){
                $elementExists = true;
                break;
            }
          }
          //now check here and if safe add element to fnIdArrayFiltered array...
          if($elementExists == false){
              $currentArrayIndex = count($fnIdArrayFiltered);
              $fnIdArrayFiltered[$currentArrayIndex] = $fnIdArray[$i];
          }
          $elementExists = false;
        }//end for $i loop eliminating repeating function_id works perfectly...
        //var_dump($fnIdArrayFiltered);
        return $fnIdArrayFiltered;
    }

    function getAllFilteredLatestFnIdsEnteredByUser($modifiedBy){
        $ctr = 0;
        $fnIdArray = array();
        try{
            //first read from tbl_goal_first_g1
            $query = "select * from tbl_goal_first_g1 where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //second read from tbl_goal_first_g1_obj_fn
            $query = "select * from tbl_goal_first_g1_obj_fn where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //third read from tbl_goal_first_g2
            $query = "select * from tbl_goal_first_g2 where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //fourth read from tbl_goal_first_g2_obj_fn
            $query = "select * from tbl_goal_first_g2_obj_fn where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //fifth read from tbl_goal_first_g3
            $query = "select * from tbl_goal_first_g3 where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //fourth read from tbl_goal_first_g3_obj_fn
            $query = "select * from tbl_goal_first_g3_obj_fn where modified_by = $modifiedBy order by modification_date desc";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
        }catch(Exception $ex){
            $ex->getMessage();
        }

        //before returning the array i need to check if there are duplicates and
        //leave out the duplicates...
        $fnIdArrayFiltered = array();

        //now check if the element already exists in the second newly created array
        $elementExists = false;
        for($i=0; $i<count($fnIdArray); $i++){
          for($j=0; $j<count($fnIdArrayFiltered);$j++){
            if($fnIdArray[$i] == $fnIdArrayFiltered[$j]){
                $elementExists = true;
                break;
            }
          }
          //now check here and if safe add element to fnIdArrayFiltered array...
          if($elementExists == false){
              $currentArrayIndex = count($fnIdArrayFiltered);
              $fnIdArrayFiltered[$currentArrayIndex] = $fnIdArray[$i];
          }
          $elementExists = false;
        }//end for $i loop eliminating repeating function_id works perfectly...
        //var_dump($fnIdArrayFiltered);
        return $fnIdArrayFiltered;

    }

    function getAllFnsForGoalSecond($goalSecondId){
      try{
        $query = "select tbl_fn.id, tbl_fn.fn_name, tbl_fn.modified_by, tbl_fn.modification_date from tbl_fn,tbl_goal_second where tbl_fn.id = tbl_goal_second.fn_id and tbl_goal_second.id = $goalSecondId";
        //echo $query;
        $result = read($query);
        return $result;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    function getAllFunctionsEnteredByThisUser($modifiedBy){
        try{
            $query = "select * from tbl_fn where modified_by = $modifiedBy OR show_all = 1 order by fn_name";
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }
?>
