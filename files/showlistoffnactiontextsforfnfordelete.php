<?php
    session_start();
    $fnId = $_GET['fnId'];
    require_once 'fnaction.php';
    //now get all thActions for
    $fnActionList = getAllFnActionsForThisFnModifiedBy($fnId, $_SESSION['LOGGED_USER_ID']);
?>
<table border="0" width="100%">
    <tr style="background:#ccc">
      <td width="10%">Ser.No</td>
      <td>Action Text</td>
      <td>Delete</td>
    </tr>
    <?php
      $ctr=1;
      if(mysql_num_rows($fnActionList)){
          while($fnActionRow = mysql_fetch_object($fnActionList)){
            ?>
              <tr>
                <td><?php echo $ctr++;?></td>
                <td><?php echo $fnActionRow->action_text;?></td>
                <td>
                    <a href="#.php" id="<?php echo $fnActionRow->id;?>" class="deleteFnActionLinkId">Delete</a>
                </td>
              </tr>
            <?php
          }//end while loop
      }else{
          ?>
              <tr>
                  <td colspan="3">
                      <div class="notify notify-yellow"><span class="symbol icon-info"></span> No Action Texts Found!</div>
                  </td>
              </tr>
          <?php
      }
    ?>
</table>
<script type="text/javascript">
  $(document).ready(function(){
    $('.deleteFnActionLinkId').click(function(){
      if(window.confirm('Are you sure you want to delete this record?')){
        var idVal = $(this).attr('id');
        var fnId = "<?php echo $fnId;?>";
        var divId = "actionDiv" + fnId;
        $('#' + divId).load('files/deletethisfnaction.php?fnActionId='+idVal);
      }
    });
  });//end document.ready function
</script>
