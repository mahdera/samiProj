<?php
    require_once 'zone.php';
    require_once 'branch.php';

    $branchList = getAllBranchs();
    if(mysql_num_rows($branchList)){
        ?>
            <table border="0" width="100%">
                <tr>
                    <td>Ser.No</td>
                    <td>Zone</td>
                    <td>Branch Name</td>
                    <td>Description</td>
                    <td>Edit</td>
                </tr>
                <?php
                  $ctr=1;
                  while($branchRow = mysql_fetch_object($branchList)){
                      $zoneObj = getZone($branchRow->zone_id);
                      ?>
                          <tr>
                              <td><?php echo $ctr++;?></td>
                              <td><?php echo $zoneObj->zone_name;?></td>
                              <td><?php echo $branchRow->branch_name;?></td>
                              <td><?php echo $branchRow->description;?></td>
                              <td>
                                  <a href="#.php" id="<?php echo $branchRow->id;?>" class="editBranchClass">Edit</a>
                              </td>
                          </tr>
                          <?php
                              $divId = "branchEditDiv" . $branchRow->id;
                          ?>
                          <tr>
                              <td colspan="5">
                                  <div id="<?php echo $divId;?>"></div>
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
        $('.editBranchClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "branchEditDiv" + idVal;
            $('#'+divId).load('files/showeditfieldsofbranch.php?branchId='+idVal);
        });
    });//end document.ready function
</script>
