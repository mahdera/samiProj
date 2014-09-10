<?php
    require_once 'dbconnection.php';
    
    function saveThAction($thId, $actionText){
        try{
            $query = "insert into tbl_th_action values(0, $thId, '$actionText')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateThAction($id, $thId, $actionText){
        try{
            $query = "update tbl_th_action set th_id = $thId, action_text = '$actionText' where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteThAction($id){
        try{
            $query = "delete from tbl_th_action where id = $id";
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
    
    function getThAction($id){
        try{
            $query = "select * from tbl_th_action where id = $id";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
