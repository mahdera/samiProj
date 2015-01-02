<?php
      require_once 'dbconnection.php';

      function saveUploadedDocuments($fileName, $modifiedBy, $subDistrictId){
        try{
          $query = "insert into tbl_uploaded_document values(0, '$fileName', $modifiedBy, $subDistrictId, NOW() )";
          save($query);
        }catch(Exception $ex){
          $ex->getMessage();
        }
      }

      function getAllUploadedDocuments(){
        try{
          $query = "select * from tbl_uploaded_document order by upload_date desc";
          $result = read($query);
          return $result;
        }catch(Exception $ex){
          $ex->getMessage();
        }
      }

      function getAllUploadedDocumentsInDivision($divisionId){
          //Sami told me that only District Admins' can upload a document....
          //so grab all uploads done by Admin(s) of the same district
          try{
              $query = "select tbl_uploaded_document.* from tbl_uploaded_document, tbl_user_district, tbl_district, tbl_sub_district where " .
              "tbl_uploaded_document.uploaded_by = tbl_user_district.user_id and " .
              "tbl_user_district.district_id = tbl_district.id and tbl_district.id = (select tbl_sub_district.district_id from tbl_sub_district where tbl_sub_district.id = $divisionId) order by upload_date desc limit 0,1";
              $result = read($query);
              return $result;
          }catch(Exception $ex){
              $ex->getMessage();
          }
      }

      function getAllUploadedDocumentsBy($uploadedBy){
          try{
              $query = "select * from tbl_uploaded_document where uploaded_by = $uploadedBy order by upload_date desc limit 0,1";
              $result = read($query);
              return $result;
          }catch(Exception $ex){
              $ex->getMessage();
          }
      }

      function getAllUploadedDocumentsForSubDistrict($subDistrictId){
          try{
              $query = "select * from tbl_uploaded_document where sub_district_id = $subDistrictId order by upload_date desc limit 0,1";
              $result = read($query);
              return $result;
          }catch(Exception $ex){
              $ex->getMessage();
          }
      }
?>
