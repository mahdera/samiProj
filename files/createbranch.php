<?php
    require_once 'branch.php';
    $zoneId = $_POST['zoneId'];
    $branchName = $_POST['branchName'];
    $description  = $_POST['description'];

    saveBranch($zoneId, $branchName, $description);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Branch Created Successfully!</div>
