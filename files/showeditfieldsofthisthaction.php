<?php
    $thId = $_GET['thId'];
    require_once 'thaction.php';
    //now get the thActionId for this thId
    $thActionObj = getThActionForTh($thId);
    //$thActionId = $_GET['thActionId'];

    if(!empty($thActionObj)){
      $thActionId = $thActionObj->id;
    //now define the control names in here...
    $thActionControlName = "textareathactionedit" . $thActionId;
    $buttonId = "btnupdatethaction" . $thActionId;
    $thActionObj = getThAction($thActionId);
?>
<form>
  <table border="0" width="100%">
      <tr>
          <td style="padding-left:10px;padding-right:15px;">
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
<?php
}else{
  ?>
    <div class="notify notify-yellow"><span class="symbol icon-info"></span> No Action Texts Found!</div>
  <?php
}
?>
<script type="text/javascript">
  $(document).ready(function(){
      var thActionId = "<?php echo $thActionId;?>";
      var buttonId = "btnupdatethaction" + thActionId;
      var thId = "<?php echo $thId;?>";

      $('#'+buttonId).click(function(){
        var thActionControlName = "textareathactionedit" + thActionId;
        var updatedText = $('#'+thActionControlName).val();
        if(updatedText !== ''){
          var dataString = "updatedText="+encodeURIComponent(updatedText)+"&thActionId="+thActionId;
          //var divId = "editThisThActionDiv" + thActionId;
          var divId = "actionDiv" + thId;
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
