<?php
    $fnId = $_POST['fnId'];
    $textAreaValue = $_POST['textAreaValue'];
    
    require_once 'fnaction.php';
    saveFnAction($fnId, $textAreaValue);
?>
<p style="background: lightgreen">
    Fn Action Saved Successfully!
</p>
