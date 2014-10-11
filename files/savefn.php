<?php
    session_start();
    require_once 'fn.php';
    $fnName = $_POST['fnName'];
    saveFn($fnName, $_SESSION['LOGGED_USER_ID']);
?>
<p style="background: lightgreen">Fn saved successfully!</p>
