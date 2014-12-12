<?php
    require_once 'dbconnection.php';

    function saveUser($firstName, $lastName, $email, $userId, $password, $phoneNumber,
            $memberType,$userStatus, $userLevel, $userRole, $modifiedBy){
        $md5Password = md5($password);
        try{
            $query = "insert into tbl_user values(0,'$firstName','$lastName','$email','$userId','$md5Password','$phoneNumber','$memberType','$userStatus', '$userLevel', '$userRole', $modifiedBy,NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateUser($id,$firstName, $lastName, $email,$phoneNumber,
            $memberType,$userStatus,$userLevel,$userRole, $modifiedBy){
        try{
            $query = "update tbl_user set first_name='$firstName', last_name='$lastName', email='$email', phone_number = '$phoneNumber', member_type = '$memberType',user_status = '$userStatus', user_level = '$userLevel', user_role = '$userRole', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function deleteUser($id){
        try{
            $query = "delete from tbl_user where id = id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllUsers(){
        try{
            $query = "select * from tbl_user order by first_name, last_name";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllApprovedUsers(){
        try{
            $query = "select * from tbl_user where user_status = 'Active' order by first_name, last_name";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getUser($id){
        try{
            $query = "select * from tbl_user where id = $id";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function isThereAUserWithUserIdAndPassword($userId,$password){
        try{
            $cnt = 0;
            $query = "select count(*) as cnt from tbl_user where user_id = '$userId' and password = md5('$password')";
            //echo $query;
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow->cnt;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function isThereAUserWithUserIdAndPasswordWithStatus($userId, $password, $userStatus){
      try{
          $cnt = 0;
          $query = "select count(*) as cnt from tbl_user where user_id = '$userId' and password = md5('$password') and user_status = 'Active'";
          //echo $query;
          $result = read($query);
          $resultRow = mysql_fetch_object($result);
          return $resultRow->cnt;
      } catch (Exception $ex) {
          $ex->getMessage();
      }
    }

    function doesThisUserAccountExistUsingEmail($email){
        try{
            $cnt = 0;
            $query = "select count(*) as cnt from tbl_user where email = '$email'";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow->cnt;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function updateUserPasswordUsingEmail($email, $randomValue){
        try{
            $query = "update tbl_user set password = md5('$randomValue') where email = '$email'";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getUserUsingEmailAddress($email){
        try{
            $query = "select * from tbl_user where email = '$email'";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getUserUsingUserId($userId){
        try{
            $query = "select * from tbl_user where user_id = '$userId'";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getUserUsingTheUserId($userId){
        try{
            $query = "select * from tbl_user where id = $userId";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function getAllNonAdminUsers(){
        try{
            $query = "select * from tbl_user where member_type != 'Admin' order by first_name, last_name";
            $result = read($query);
            return $result;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function resetUserPassword($id, $password){
        try{
            $query = "update tbl_user set password = md5('$password') where id = $id";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function changeUserPasswordForThisUser($userId, $currentPassword, $newPassword){
        try{
            $query = "update tbl_user set password = md5('$newPassword'), modification_date = NOW() where user_id = '$userId' and password = md5('$currentPassword')";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function changeUserUserIdForThisUser($currentUserId, $newUserId, $password){
        try{
            $query = "update tbl_user set user_id = '$newUserId', modification_date = NOW() where user_id = '$currentUserId' and password = md5('$password') ";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function activateUserAccountUsingEmail($email){
        try{
            $query = "update tbl_user set user_status = 'Active' where email = '$email'";
            save($query);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function fetchUserByUserIdAndEmail($userId, $email){
        try{
            $query = "select * from tbl_user where user_id = '$userId' and email = '$email'";
            $result = read($query);
            $resultRow = mysql_fetch_object($result);
            return $resultRow;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllBranchUsersWithBranchId($branchId){
        try{
            $query = "select tbl_user.* from tbl_user, tbl_user_branch where tbl_user.id = tbl_user_branch.user_id and tbl_user_branch.branch_id = $branchId order by first_name, last_name";
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getAllSubDistrictUsersWithDistrictId($districtId){
        try{
          $query = "select tbl_user.* from tbl_user, tbl_user_sub_district, tbl_sub_district " .
          "where tbl_user.id = tbl_user_sub_district.user_id and tbl_user_sub_district.sub_district_id = tbl_sub_district.id and " .
          "tbl_sub_district.district_id = $districtId order by first_name, last_name";
          $result = read($query);
          return $result;
        }catch(Exception $ex){
          $ex->getMessage();
        }
    }

    function getAllDistrictAndSubDistrictUsersWithDistrictId($districtId){
        try{
            $query = "select tbl_user.* from tbl_user, tbl_user_district where tbl_user.id = tbl_user_district.user_id and " .
            "tbl_user_district.district_id = $districtId UNION select tbl_user.* from tbl_user, tbl_user_sub_district, tbl_sub_district " .
            "where tbl_user.id = tbl_user_sub_district.user_id and tbl_user_sub_district.sub_district_id = tbl_sub_district.id and " .
            "tbl_sub_district.district_id = $districtId order by first_name, last_name";
            $result = read($query);
            return $result;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }

    function getUserFromThisSubDistrictWithStatus($subDistrictId, $status){
      try{
        $query = "select tbl_user.* from tbl_user, tbl_user_sub_district where tbl_user.user_status = '$status' and " .
        "tbl_user.id = tbl_user_sub_district.user_id and tbl_user_sub_district.sub_district_id = $subDistrictId order by first_name, last_name limit 0,1";
        $result = read($query);
        $resultRow = mysql_fetch_object($result);
        return $resultRow;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }
?>
