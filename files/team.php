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
            $query = "update tbl_team set team_name = '$name', title='$title', organization='$organization', email='$email', phone='$phone', interest='$interest', modified_by = $modifiedBy, modification_date = NOW() where id=$id";
            //echo $query;
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

    function getAllTeamsModifiedByUsingUserLevel($userLevel, $divisionId){
        try{
            $query = null;
            if($userLevel == 'Branch Level'){
                $query = "select tbl_team.* from tbl_team, tbl_user_branch where " .
                "tbl_team.modified_by = tbl_user_branch.user_id and " .
                "tbl_user_branch.branch_id = $divisionId order by team_name asc";
            }else if($userLevel == 'Zone Level'){
                $query = "select tbl_team.* from tbl_team, tbl_user_zone, tbl_user_branch, " .
                "tbl_branch where tbl_team.modified_by = tbl_user_zone.user_id and " .
                "tbl_user_zone.zone_id = tbl_branch.zone_id and tbl_branch.zone_id = $divisionId " .
                "UNION ".
                "select tbl_team.* from tbl_team, tbl_user_zone where tbl_team.modified_by = ".
                "tbl_user_zone.user_id and tbl_user_zone.zone_id = $divisionId";
            }
            echo $query;
            $result = read($query);
            return $result;
        }catch(Exception $ex){
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
