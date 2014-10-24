<?php
    require_once 'dbconnection.php';

    function saveFn($fnName, $modifiedBy){
        try{
            $query = "insert into tbl_fn values(0, '$fnName', $modifiedBy, NOW())";
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

    function getAllFilteredLatestFnIdsEnteredByUser($modifiedBy){
        $ctr = 0;
        $fnIdArray = array();
        try{            
            //first read from tbl_goal_first_g1
            $query = "select * from tbl_goal_first_g1 where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //second read from tbl_goal_first_g1_obj_fn
            $query = "select * from tbl_goal_first_g1_obj_fn where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //third read from tbl_goal_first_g2
            $query = "select * from tbl_goal_first_g2 where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //fourth read from tbl_goal_first_g2_obj_fn
            $query = "select * from tbl_goal_first_g2_obj_fn where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //fifth read from tbl_goal_first_g3
            $query = "select * from tbl_goal_first_g3 where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
            //fourth read from tbl_goal_first_g3_obj_fn
            $query = "select * from tbl_goal_first_g3_obj_fn where modified_by = $modifiedBy order by modification_date desc limit 0,1";
            $result = read($query);
            while($resultRow = mysql_fetch_object($result)){
                $fnIdArray[$ctr] = $resultRow->fn_id;
                $ctr++;
            }//end while loop
        }catch(Exception $ex){
            $ex->getMessage();
        }
        return $fnIdArray;
    }
?>
