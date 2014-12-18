<?php
    require_once 'subdistrict.php';
    $zoneId = $_POST['zoneId'];
    $branchList = getAllSubDistrictsOfThisDistrict($zoneId);
?>
<tr id="branchRowDetail">
  <td><font color='red'>*</font> Sub District:</td>
  <td>
      <select name="slctbranch" id="slctbranch" style="width:100%">
          <option value="" selected="selected">--Select--</option>
          <?php
            while($branchRow = mysql_fetch_object($branchList)){
              ?>
                <option value="<?php echo $branchRow->id;?>"><?php echo $branchRow->display_name;?></option>
              <?php
            }//end while loop
          ?>
      </select>
  </td>
</tr>
