<?php
    $updatedText = $_POST['updatedText'];
    $fnActionId = $_POST['fnActionId'];
    require_once 'fnaction.php';
    updateFnAction($fnActionId, $updatedText);
?>
<p style="background: lightgreen">Fn Action Updated Successfully!</p>

