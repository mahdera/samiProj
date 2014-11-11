<?php
    error_reporting( 0 );
    $thActionId = $_GET['thActionId'];
    require_once 'thaction.php';
    deleteThAction($thActionId);
    //deleteThAction($thId); this will be automatically taken care of by MySQL...
    //require_once 'editthactionmanagementform.php';
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Th Action Deleted Successfully!</div>
