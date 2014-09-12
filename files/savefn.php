<?php
    require_once 'fn.php';
    $fnName = $_POST['fnName'];
    saveFn($fnName);
?>
<p style="background: lightgreen">Fn saved successfully!</p>
