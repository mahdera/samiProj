<?php
    require_once 'branch.php';
    $zoneId = $_POST['zoneId'];
    $branchList = getAllBranchsOfThisZone($zoneId);
?>
<tr id="branchRow">
  <td><font color='red'>*</font> Branch:</td>
  <td>
      <select name="slctbranch" id="slctbranch" style="width:100%">
          <option value="" selected="selected">--Select--</option>
          <?php
            while($branchRow = mysql_fetch_object($branchList)){
              ?>
                <option value="<?php echo $branchRow->id;?>"><?php echo $branchRow->branch_name;?></option>
              <?php
            }//end while loop
          ?>
      </select>
  </td>
</tr>
