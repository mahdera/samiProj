<?php
    require_once 'dbconnection.php';
    
    function saveTeam($name, $title, $organization, $email, $phone, $interest){
        try{
            $query = "insert into tbl_team values (0,'$name', '$title', '$organization', '$email', '$phone', '$interest')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
        
    function updateTeam($id, $name, $title, $organization, $email, $phone, $interest){
        try{
            $query = "update tbl_team set name = '$name', title='$title', organization='$organization', email='$email', phone='$phone', interest='$interest' where id=$id";
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

