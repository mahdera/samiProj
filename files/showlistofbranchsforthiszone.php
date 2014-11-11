<?php
    require_once 'branch.php';
    $zoneId = $_GET['zoneId'];
    $branchList = getAllBranchsOfThisZone($zoneId);
?>
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
