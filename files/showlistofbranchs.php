<?php
    session_start();
    require_once 'district.php';
    require_once 'subdistrict.php';
    require_once 'user.php';
    require_once 'userdistrict.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    $branchList = null;
    if($userObj->member_type = 'Admin'){
      $branchList = getAllSubDistricts();
    }else{
      $districtId = getDistrictIdForUser($userObj->id);
      $branchList = getAllSubDistrictsWithInThisDistrict($districtId);
    }

    if(mysql_num_rows($branchList)){
        ?>
            <table border="0" width="100%">
                <tr>
                    <td>District</td>
                    <td>Sub District Name</td>
                    <td>Description</td>
                </tr>
                <?php
                  $ctr=1;
                  while($branchRow = mysql_fetch_object($branchList)){
                      $zoneObj = getDistrict($branchRow->district_id);
                      ?>
                          <tr>
                              <td><?php echo $zoneObj->display_name;?></td>
                              <td><?php echo $branchRow->display_name;?></td>
                              <td><?php echo $branchRow->description;?></td>
                          </tr>
                      <?php
                  }//end while loop
                ?>
            </table>
        <?php
    }else{
      ?>
          <div class="notify notify-yellow"><span class="symbol icon-info"></span> There is/are no sub district(s) in the database!</div>
      <?php
    }
?>
