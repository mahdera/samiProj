<?php
    $thId = $_POST['thId'];
    $textAreaValue = $_POST['textAreaValue'];
    
    require_once 'thaction.php';
    saveThAction($thId, $textAreaValue);
?>
<p style="background: lightgreen">
    Th Action Saved Successfully!
</p>
