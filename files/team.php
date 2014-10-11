<?php
    require_once 'dbconnection.php';
    
    function saveTeam($name, $title, $organization, $email, $phone, $interest, $modifiedBy){
        try{
            $query = "insert into tbl_team values (0,'$name', '$title', '$organization', '$email', '$phone', '$interest', $modifiedBy, NOW())";            
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
        
    function updateTeam($id, $name, $title, $organization, $email, $phone, $interest, $modifiedBy){
        try{
            $query = "update tbl_team set name = '$name', title='$title', organization='$organization', email='$email', phone='$phone', interest='$interest', modified_by = $modifiedBy, modification_date = NOW() where id=$id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteTeam($id){
        try{
            $query = "delete from tbl_team where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllTeams(){
        try{
            $query = "select * from tbl_team order by team_name asc";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllTeamsModifiedBy($modifiedBy){
        try{
            $query = "select * from tbl_team where modified_by = $modifiedBy order by team_name asc";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getTeam($id){
        try{
            $query = "select * from tbl_team where id = $id";            
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>

