<?php
    require_once 'fnaction.php';
    $fnId = $_GET['fnId'];
    deleteFnActionForFn($fnId);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Deleted Successfully</div>
