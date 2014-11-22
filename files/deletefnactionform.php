<?php
    session_start();
    $fnActionId = $_GET['fnActionId'];
    require_once 'fnaction.php';
    require_once 'fn.php';
    deleteFnAction($fnActionId);
    $fnActionList = getAllFnActionsModifiedBy($_SESSION['LOGGED_USER_ID']);
    require '../editfnactionmanagementform.php';
    require_once '../importjsscripts.php';
?>
