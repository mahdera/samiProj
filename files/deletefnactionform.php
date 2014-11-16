<?php
    session_start();
    $fnActionId = $_GET['fnActionId'];
    require_once 'files/fnaction.php';
    deleteFnAction($fnActionId);
    $fnActionList = getAllFnActionsModifiedBy($_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Fn Action Deleted Successfully!</div>
<table border="0" width="100%">
    <tr style="background: #ccc">
        <td width="10%">Ser.No</td>
        <td>Fn</td>
        <td>Fn Action Text</td>
        <td>Action</td>
    </tr>
    <?php
        $ctr=1;
        while($fnActionRow = mysql_fetch_object($fnActionList)){
            $fnObj = getFn($fnActionRow->fn_id);
            ?>
            <tr>
                <td><?php echo $ctr++;?></td>
                <td><?php echo $fnObj->fn_name;?></td>
                <td><?php echo $fnActionRow->action_text;?></td>
                <td>
                    <?php
                        $editLinkId = $fnActionRow->id;
                        $editDivId = "editActionTextDiv" . $fnActionRow->id;
                        $deleteLinkId = $fnActionRow->id;
                    ?>
                    <a href="#.php" id="<?php echo $editLinkId;?>" class="editFnActionLinkId">Edit</a>
                    |
                    <a href="#.php" id="<?php echo $deleteLinkId;?>" class="deleteFnActionLinkId">Delete</a>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div id="<?php echo $editDivId;?>"></div>
                </td>
            </tr>
            <?php
        }//end while loop
    ?>
</table>
