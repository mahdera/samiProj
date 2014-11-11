<?php
    require_once 'zone.php';

    $zoneList = getAllZones();
    if(mysql_num_rows($zoneList)){
        ?>
            <table border="0" width="100%">
                <tr>
                    <td>Ser.No</td>
                    <td>Zone Name</td>
                    <td>Description</td>
                </tr>
                <?php
                  $ctr=1;
                  while($zoneRow = mysql_fetch_object($zoneList)){
                      ?>
                          <tr>
                              <td><?php echo $ctr++;?></td>
                              <td><?php echo $zoneRow->zone_name;?></td>
                              <td><?php echo $zoneRow->description;?></td>
                          </tr>
                      <?php
                  }//end while loop
                ?>
            </table>
        <?php
    }
?>
