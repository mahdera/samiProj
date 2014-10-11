<?php
    require_once 'dbconnection.php';
    
    function saveResponsibility($teamId, $role, $responsibility, $modifiedBy){
        try{
            $query = "insert into tbl_responsibility values (0, $teamId, '$role', '$responsibility', $modifiedBy, NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
        
    function updateResponsibility($id, $teamId, $role, $responsibility, $modifiedBy){
        try{
            $query = "update tbl_responsibility set team_id = $teamId, role='$role', responsibility='$responsibility', modified_by = $modifiedBy, modification_date = NOW() where id=$id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteResponsibility($id){
        try{
            $query = "delete from tbl_responsibility where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllResponsibilities(){
        try{
            $query = "select * from tbl_responsibility";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getResponsibility($id){
        try{
            $query = "select * from tbl_responsibility where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>

