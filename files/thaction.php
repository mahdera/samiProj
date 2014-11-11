<?php
    require_once 'dbconnection.php';

    function saveThAction($thId, $actionText, $modifiedBy){
        try{
            $query = "insert into tbl_th_action values(0, $thId, '$actionText', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateThAction($id, $actionText, $modifiedBy){
        try{
            $query = "update tbl_th_action set action_text = '$actionText', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            //echo $query;
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteThAction($id){
        try{
            $query = "delete from tbl_th_action where id = $id";
            //echo $query;
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllThActions(){
        try{
            $query = "select * from tbl_th_action";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllThActionsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_th_action where modified_by = $modifiedBy";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getThAction($id){
        try{
            $query = "select * from tbl_th_action where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function doesThisThAlreadyActionFilledForIt($thId){
        try{
            $query = "select count(*) as cnt from tbl_th_action where th_id = $thId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow->cnt;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllThActionsForThisTh($thId){
      try{
          $query = "select * from tbl_th_action where th_id = $thId";
          $result = read($query);
          return $result;
      } catch (Exception $ex) {
          $ex->getMessage();
      }
    }
?>
