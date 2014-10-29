<?php
    require_once 'thaction.php';
    $updatedText = $_POST['updatedText'];
    $thActionId = $_POST['thActionId'];
    updateThAction($thActionId, $updatedText);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Th Action Updated Successfully!</div>
