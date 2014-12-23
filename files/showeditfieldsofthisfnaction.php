<?php
    $fnId = $_GET['fnId'];
    require_once 'fnaction.php';
    //now get the fnAction object for this fnId
    $fnActionObj = getFnActionForFn($fnId);
    $fnActionId = null;

    if(!empty($fnActionObj)){

    $fnActionId = $fnActionObj->id;


    //now define the control names in here...
    $fnActionControlName = "textareafnactionedit" . $fnActionId;
    $buttonId = "btnupdatefnaction" . $fnActionId;
    $fnActionObj = getFnAction($fnActionId);
?>
<form>
  <table border="0" width="100%">
      <tr>
          <td style="padding-left:10px;padding-right:15px">
              <textarea name="<?php echo $fnActionControlName;?>" id="<?php echo $fnActionControlName;?>" rows="3" style="width:100%"><?php echo $fnActionObj->action_text;?></textarea>
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
      var fnActionId = "<?php echo $fnActionId;?>";
      var buttonId = "btnupdatefnaction" + fnActionId;
      var fnId = "<?php echo $fnId;?>";
      $('#'+buttonId).click(function(){
        var fnActionControlName = "textareafnactionedit" + fnActionId;
        var updatedText = $('#'+fnActionControlName).val();
        if(updatedText !== ''){
          var dataString = "updatedText="+encodeURIComponent(updatedText)+"&fnActionId="+fnActionId;
          var divId = "actionDiv" + fnId;
          $.ajax({
              url: 'files/updatethisfnaction.php',
              data: dataString,
              type:'POST',
              success:function(response){
                $('#innerDivToRefresh').load('putfnactionmanagementform.php');
                  //$('#'+divId).html(response);
              },
              error:function(error){
                  alert(error);
              }
          });
        }
      });
  });//end document.ready function
</script>
