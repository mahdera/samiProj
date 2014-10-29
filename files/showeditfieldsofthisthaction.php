<?php
    $thActionId = $_GET['thActionId'];
    require_once 'thaction.php';
    //now define the control names in here...
    $thActionControlName = "textareathactionedit" . $thActionId;
    $buttonId = "btnupdatethaction" . $thActionId;
    $thActionObj = getThAction($thActionId);
?>
<form>
  <table border="0" width="100%">
      <tr>
          <td>
              <textarea name="<?php echo $thActionControlName;?>" id="<?php echo $thActionControlName;?>" rows="3" style="width:100%"><?php echo ;?><?php echo $thActionObj->action_text;?></textarea>
          </td>
      </tr>
      <tr>
          <td align="right">
              <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
          </td>
      </tr>
  </table>
</form>
