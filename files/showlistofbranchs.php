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
                          </tr>
                      <?php
                  }//end while loop
                ?>
            </table>
        <?php
    }
?>
