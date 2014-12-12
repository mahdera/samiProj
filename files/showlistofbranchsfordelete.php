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
            <table border="0" width="100%">
                <tr>
                    <td>District</td>
                    <td>Sub District Name</td>
                    <td style="display:none">Description</td>
                    <td>Delete</td>
                </tr>
                <?php
                  $ctr=1;
                  while($branchRow = mysql_fetch_object($branchList)){
                      $zoneObj = getDistrict($branchRow->district_id);
                      ?>
                          <tr>
                              <td style="display:none"><?php echo $ctr++;?></td>
                              <td><?php echo $zoneObj->display_name;?></td>
                              <td><?php echo $branchRow->display_name;?></td>
                              <td style="display:none"><?php echo $branchRow->description;?></td>
                              <td>
                                  <a href="#.php" id="<?php echo $branchRow->id;?>" class="deleteBranchClass">Delete</a>
                              </td>
                          </tr>
                      <?php
                  }//end while loop
                ?>
            </table>
        <?php
    }
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.deleteBranchClass').click(function(){
            var idVal = $(this).attr('id');

            if(window.confirm('Are you sure you want to delete this record?')){
                var dataString = "branchId="+idVal;
                $.ajax({
                    url: 'files/deletebranch.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('#branchManagementDiv').load('files/showlistofbranchsfordelete.php');
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });
    });//end document.ready function
</script>
