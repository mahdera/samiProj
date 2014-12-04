<?php
    session_start();
    $thId = $_GET['thId'];
    require_once 'thaction.php';
    require_once 'usersubdistrict.php';
    require_once 'user.php';

    //now get all thActions for
    //$thActionList = getAllThActionsForThisThModifiedBy($thId, $_SESSION['LOGGED_USER_ID']);
    $thActionList = null;
    $thActionList = getAllThActionForThisTh($thId);
?>
<table border="0" width="100%">
    <tr style="background:#ccc">
      <td width="10%">Ser.No</td>
      <td>Action Text</td>
      <td>Edit</td>
    </tr>
    <?php
      $ctr=1;
      if(isset($thActionList) && mysql_num_rows($thActionList)){
          while($thActionRow = mysql_fetch_object($thActionList)){
            ?>
              <tr>
                <td><?php echo $ctr++;?></td>
                <td><?php echo stripslashes($thActionRow->action_text);?></td>
                <td>
                    <a href="#.php" id="<?php echo $thActionRow->id;?>" class="editThActionLinkId">Edit</a>
                </td>
              </tr>
              <?php
                  $divId = "editThisThActionDiv" . $thActionRow->id;
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
    $('.editThActionLinkId').click(function(){
        var thId = "<?php echo $thId;?>";
        var idVal = $(this).attr('id');
        var divId = "editThisThActionDiv" + idVal;
        $('#' + divId).load('files/showeditfieldsofthisthaction.php?thActionId='+idVal+'&thId='+thId);
    });
  });//end document.ready function
</script>
