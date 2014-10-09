<?php
    $id = $_POST['id'];
    $thName = $_POST['thName'];
    require_once 'th.php';
    updateTh($id, $thName);
?>
<p style="background: lightgreen">Th Updated Successfully!</p>