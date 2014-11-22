<?php
    session_start();
    $fnId = $_GET['fnId'];
    require_once 'fnaction.php';
    //now get all thActions for
    $fnActionList = getAllFnActionsForThisFnModifiedBy($fnId, $_SESSION['LOGGED_USER_ID']);
?>
<table border="0" width="100%">
    <tr style="background:#ccc">
      <td>Ser.No</td>
      <td>Action Text</td>
      <td>Edit</td>
    </tr>
    <?php
      $ctr=1;
      if(mysql_num_rows($fnActionList)){
          while($fnActionRow = mysql_fetch_object($fnActionList)){
            ?>
              <tr>
                <td width="10%"><?php echo $ctr++;?></td>
                <td><?php echo $fnActionRow->action_text;?></td>
                <td>
                    <a href="#.php" id="<?php echo $fnActionRow->id;?>" class="editFnActionLinkId">Edit</a>
                </td>
              </tr>
              <?php
                  $divId = "editThisFnActionDiv" . $fnActionRow->id;
              ?>
              <tr>
                  <td colspan="3">
                      <div id="<?php echo $divId;?>"></div>
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
    $('.editFnActionLinkId').click(function(){
        var fnId = "<?php echo $fnId;?>";
        var idVal = $(this).attr('id');
        var divId = "editThisFnActionDiv" + idVal;
        $('#' + divId).load('files/showeditfieldsofthisfnaction.php?fnActionId='+idVal+"&fnId="+fnId);
    });
  });//end document.ready function
</script>
