<?php
    session_start();
    require_once 'district.php';
    require_once 'user.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    $districtList = null;

    if($userObj->member_type == 'Admin'){
        $districtList = getAllDistricts();
    }/*else if($userObj->member_type == 'User' && $userObj->user_level == '01'){
        $districtList = getAllDistrictsModifiedBy($userObj->id);
    }*/

    if(isset($districtList) && mysql_num_rows($districtList)){
        ?>
            <table border="0" width="100%">
                <tr>
                    <td>District Name</td>
                    <td>Description</td>
                </tr>
                <?php
                  $ctr=1;
                  while($districtRow = mysql_fetch_object($districtList)){
                      ?>
                          <tr>
                              <td><?php echo stripslashes($districtRow->display_name);?></td>
                              <td><?php echo stripslashes($districtRow->description);?></td>
                          </tr>
                      <?php
                  }//end while loop
                ?>
            </table>
        <?php
    }else{
      ?>
          <div class="notify notify-yellow"><span class="symbol icon-info"></span> There is/are no district(s) in the database!</div>
      <?php
    }
?>
