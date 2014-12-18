<?php
    require_once 'thaction.php';
    $thId = $_GET['thId'];
    deleteThActionForTh($thId);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Deleted Successfully</div>
