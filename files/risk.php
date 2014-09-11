<?php

    require_once './dbconnection.php';
    
    function saveRisk($thId, $mg, $dr, $pr, $wa, $rs){
        try{
            $query = "insert into tbl_risk values(0, $thId, '$mg', '$dr', '$pr', '$wa', '$rs')";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateRisk($id, $thId, $mg, $dr, $pr, $wa, $rs){
        try{
            $query = "update tbl_risk set th_id = , mg = '$mg', dr = '$dr', pr = '$pr', wa = '$wa', rs = '$rs' where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function deleteRisk($id){
        try{
            $query = "delete from tbl_risk where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getAllRisks(){
        try{
            $query = "select * from tbl_risk";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function getRisk($id){
        try{
            $query = "select * from tbl_risk where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

?>

