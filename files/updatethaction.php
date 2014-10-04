<?php
    $updatedText = $_POST['updatedText'];
    $thActionId = $_POST['thActionId'];
    require_once 'thaction.php';
    updateThAction($thActionId, $updatedText);
?>
<p style="background: lightgreen">Th Action Updated Successfully!</p>

