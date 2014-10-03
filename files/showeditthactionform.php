<?php
    $thActionId = $_GET['id'];
    require_once 'thaction.php';
    $thActionObj = getThAction($thActionId);
    $thEditActionText = "thEditActionText" . $thActionId;
    $buttonId = "updateThActionText" . $thActionId;
?>
<form>
    <table border="0" width="100%">
        <tr>
            <td width="5%">Th Action:</td>
            <td>
                <textarea name="<?php echo $thEditActionText;?>" id="<?php echo $thEditActionText;?>" style="width: 100%" rows="3"><?php echo $thActionObj->action_text;?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
                <input type="reset" value="Undo"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        alert('form inserted');
    });//end document.ready fucntion
</script>