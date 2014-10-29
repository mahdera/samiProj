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
              <textarea name="<?php echo $thActionControlName;?>" id="<?php echo $thActionControlName;?>" rows="3" style="width:100%"><?php echo $thActionObj->action_text;?></textarea>
          </td>
      </tr>
      <tr>
          <td align="right">
              <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
          </td>
      </tr>
  </table>
</form>
<script type="text/javascript">
  $(document).ready(function(){
      var thActionId = "<?php echo $thActionId;?>";
      var buttonId = "btnupdatethaction" + thActionId;
      $('#'+buttonId).click(function(){
        var thActionControlName = "textareathactionedit" + thActionId;
        var updatedText = $('#'+thActionControlName).val();
        if(updatedText !== ''){
          var dataString = "updatedText="+encodeURIComponent(updatedText)+"&thActionId="+thActionId;
          var divId = "editThisThActionDiv" + thActionId;
          $.ajax({
              url: 'files/updatethisthaction.php',
              data: dataString,
              type:'POST',
              success:function(response){
                  $('#'+divId).html(response);
              },
              error:function(error){
                  alert(error);
              }
          });
        }
      });
  });//end document.ready function
</script>
