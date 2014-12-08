<?php
    @session_start();
    $thActionId = $_GET['thActionId'];
    require_once 'thaction.php';
    require_once 'th.php';
    deleteThAction($thActionId);
    $thActionList = getAllThActionsModifiedBy($_SESSION['LOGGED_USER_ID']);
    require_once '../editthactionmanagementform.php';
    require_once '../importjsscripts.php';
?>
