<?php
    $fnActionId = $_GET['fnActionId'];
    require_once 'fnaction.php';
    deleteFnAction($fnActionId);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Fn Action Deleted Successfully!</div>
