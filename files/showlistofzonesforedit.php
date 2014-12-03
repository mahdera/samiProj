<?php
    require_once 'district.php';

    $districtList = getAllDistricts();
    if(isset($districtList) && mysql_num_rows($districtList)){
        ?>
            <table border="0" width="100%">
                <tr>
                    <td>District Name</td>
                    <td>Description</td>
                    <td>Edit</td>
                </tr>
                <?php
                  $ctr=1;
                  while($districtRow = mysql_fetch_object($districtList)){
                      ?>
                          <tr>
                              <td><?php echo $districtRow->display_name;?></td>
                              <td><?php echo $districtRow->description;?></td>
                              <td>
                                  <a href="#" id="<?php echo $districtRow->id;?>" class="editZoneClass">Edit</a>
                              </td>
                          </tr>
                          <?php
                              $divId = "zoneEditDiv" . $districtRow->id;
                          ?>
                          <tr>
                              <td colspan="3">
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
          <div class="notify notify-yellow"><span class="symbol icon-info"></span> There is/are no district(s) in the database!</div>
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
