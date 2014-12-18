<?php
    session_start();
    require_once 'subdistrict.php';
    $zoneId = $_POST['zoneId'];
    $branchName = addslashes($_POST['branchName']);
    $description  = addslashes($_POST['description']);
    //first check if this sub district is already saved...by the given name...
    $isBranchAlreadySaved = hasThisBranchAlreadySavedInDatabase($branchName);

    if($isBranchAlreadySaved == 0){
      saveSubDistrict($zoneId, $branchName,$branchName, $description, $_SESSION['LOGGED_USER_ID']);
      ?>
        <div class="notify notify-green"><span class="symbol icon-tick"></span> Sub District Created Successfully!</div>
      <?php
    }else if($isBranchAlreadySaved != 0){
      ?>
        <div class="notify notify-yellow"><span class="symbol icon-info"></span> Sub District Aleady In Database</div>
      <?php
    }
?>
