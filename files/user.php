<?php
    require_once './dbconnection.php';
    
    function saveUser($firstName, $lastName, $email, $userId, $password, $phoneNumber,
            $memberType, $modifiedBy){
        $md5Password = md5($password);
        try{
            $query = "insert into tbl_user values(0,'$firstName','$lastName','$email','$userId','$md5Password','$phoneNumber','$memberType',$modifiedBy,NOW())";
            save($query);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    function updateUser($id,$firstName, $lastName, $email, $userId, $password, $phoneNumber,
            $memberType, $modifiedBy){
        try{
            $query = "update tbl_user set first_name='$firstName', last_name='$lastName', email='$email', ".
                    "phone_number = '$phoneNumber', member_type = '$memberType', modified_by = $modifiedBy, modification_date = NOW() where id = $id";
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
            $query = "select * from tbl_user order first_name, last_name";
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
?>
