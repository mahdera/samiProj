<?php
    $thActionId = $_GET['thActionId'];
    require_once 'thaction.php';
    deleteThAction($thActionId);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Th Action Deleted Successfully!</div>
