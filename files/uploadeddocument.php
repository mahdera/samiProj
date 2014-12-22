<?php
  require_once 'dbconnection.php';

  function saveUploadedDocuments($fileName, $modifiedBy){
    try{
      $query = "insert into tbl_uploaded_document values(0, '$fileName', $modifiedBy, NOW() )";      
      save($query);
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }

  function getAllUploadedDocuments(){
    try{
      $query = "select * from tbl_uploaded_document order by upload_date desc";
      $resultSet = read($query);
      return $resultSet;
    }catch(Exception $ex){
      $ex->getMessage();
    }
  }
?>
