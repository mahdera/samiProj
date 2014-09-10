<?php
    require_once './dbconnection.php';
    
    function saveTh($thName){
        try{
            $query = "insert into tbl_th values(0, '$thName')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateTh($id, $thName){
        try{
            $query = "update tbl_th set th_name = '$thName' where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteTh($id){
        try{
            $query = "delete from tbl_th where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllThs(){
        try{
            $query = "select * from tbl_th order by th_name";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getTh($id){
        try{
            $query = "select * from tbl_th where id = $id";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
?>
