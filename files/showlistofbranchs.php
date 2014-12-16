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

    if(!empty($branchList) && mysql_num_rows($branchList)){
        ?>
            <table border="1" width="100%" rules="all">
                <tr style="background:#eee;font-weight:bolder;">
                    <td>Sub District Name</td>
                    <td>Action</td>
                </tr>
                <?php
                  $ctr=1;
                  while($branchRow = mysql_fetch_object($branchList)){
                      $zoneObj = getDistrict($branchRow->district_id);
                      ?>
                          <tr>
                              <td><?php echo $branchRow->display_name;?></td>
                              <td align="middle">
                                  <a href="#.php" id="<?php echo $branchRow->id;?>" class="editBranchClass"><img src="images/edit.png" border="0" align="absmiddle"/></a>
                                  |
                                  <a href="#.php" id="<?php echo $branchRow->id;?>" class="deleteBranchClass"><img src="images/delete.png" border="0" align="absmiddle"/></a>
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
          $('#'+divId).load('files/showeditfieldsofbranch.php?branchId='+idVal);
      });

      $('.deleteBranchClass').click(function(){
        var idVal = $(this).attr('id');

        if(window.confirm('Are you sure you want to delete this record?')){
          var dataString = "branchId="+idVal;
          $.ajax({
            url: 'files/deletebranch.php',
            data: dataString,
            type:'POST',
            success:function(response){
              //$('#branchManagementDiv').load('files/showlistofbranchsfordelete.php');
              $('#branchManagementDiv').load('files/showlistofbranchs.php');
            },
            error:function(error){
              alert(error);
            }
          });
        }
      });

  });//end document.ready function
</script>
