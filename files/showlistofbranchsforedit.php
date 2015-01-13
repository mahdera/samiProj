<?php
    @session_start();
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

    if(!empty($branchList) && mysql_num_rows($branchList)){
        ?>
            <table border="1" width="100%" rules="all">
                <tr style="background:#eee;font-weight:bolder">
                    <td style="display:none">District</td>
                    <td>Sub District Name</td>
                    <td style="display:none">Description</td>
                    <td>Edit</td>
                </tr>
                <?php
                  $ctr=1;
                  while($branchRow = mysql_fetch_object($branchList)){
                      $zoneObj = getDistrict($branchRow->district_id);
                      ?>
                          <tr>
                              <td style="display:none"><?php echo $zoneObj->display_name;?></td>
                              <td><?php echo $branchRow->display_name;?></td>
                              <td style="display:none"><?php echo $branchRow->description;?></td>
                              <td>
                                  <a href="#.php" id="<?php echo $branchRow->id;?>" class="editBranchClass">Edit</a>
                              </td>
                          </tr>
                          <?php
                              $divId = "branchEditDiv" . $branchRow->id;
                          ?>
                          <tr>
                              <td colspan="2">
                                  <div id="<?php echo $divId;?>"></div>
                              </td>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('.editBranchClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "branchEditDiv" + idVal;
            $('#'+divId).load('files/showeditfieldsofbranch.php?branchId='+idVal,{noncache: new Date().getTime()});
        });
    });//end document.ready function
</script>
