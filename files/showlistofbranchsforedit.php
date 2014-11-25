<?php
    require_once 'district.php';
    require_once 'subdistrict.php';

    $branchList = getAllSubDistricts();
    if(mysql_num_rows($branchList)){
        ?>
            <table border="0" width="100%">
                <tr>
                    <td>District</td>
                    <td>Sub District Name</td>
                    <td>Description</td>
                    <td>Edit</td>
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
                              <td>
                                  <a href="#.php" id="<?php echo $branchRow->id;?>" class="editBranchClass">Edit</a>
                              </td>
                          </tr>
                          <?php
                              $divId = "branchEditDiv" . $branchRow->id;
                          ?>
                          <tr>
                              <td colspan="4">
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
    });//end document.ready function
</script>
