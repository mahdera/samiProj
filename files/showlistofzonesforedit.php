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
                    <td>Edit</td>
                </tr>
                <?php
                  $ctr=1;
                  while($zoneRow = mysql_fetch_object($zoneList)){
                      ?>
                          <tr>
                              <td><?php echo $ctr++;?></td>
                              <td><?php echo $zoneRow->zone_name;?></td>
                              <td><?php echo $zoneRow->description;?></td>
                              <td>
                                  <a href="#" id="<?php echo $zoneRow->id;?>" class="editZoneClass">Edit</a>
                              </td>
                          </tr>
                          <?php
                              $divId = "zoneEditDiv" . $zoneRow->id;
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
    }
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.editZoneClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "zoneEditDiv" + idVal;
            $('#'+divId).load('files/showeditfieldsofzone.php?zoneId='+idVal);
        });
    });//end document.ready function
</script>
