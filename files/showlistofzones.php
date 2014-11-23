<?php
    require_once 'district.php';

    $districtList = getAllDistricts();
    if(mysql_num_rows($districtList)){
        ?>
            <table border="0" width="100%">
                <tr>
                    <td>Ser.No</td>
                    <td>District Name</td>
                    <td>Description</td>
                </tr>
                <?php
                  $ctr=1;
                  while($districtRow = mysql_fetch_object($districtList)){
                      ?>
                          <tr>
                              <td><?php //echo $ctr++;?></td>
                              <td><?php echo $districtRow->district_name;?></td>
                              <td><?php echo $districtRow->description;?></td>
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
