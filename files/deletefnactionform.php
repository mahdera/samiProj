<?php
    $fnActionId = $_GET['fnActionId'];
    require_once 'fnaction.php';
    deleteThAction($thActionId);
    //deleteThAction($thId); this will be automatically taken care of by MySQL...
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Fn Action Deleted Successfully!</div>
