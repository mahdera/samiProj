<?php
    $thId = $_GET['thId'];
    require_once 'thaction.php';
    //now get all thActions for
    $thActionList = getAllThActionsForThisTh($thId);
?>
<table border="0" width="100%">
    <tr style="background:#ccc">
      <td>Ser.No</td>
      <td>Action Text</td>
      <td>Edit</td>
    </tr>
    <?php
      $ctr=1;
      if(mysql_num_rows($thActionList)){
          while($thActionRow = mysql_fetch_object($thActionList)){
            ?>
              <tr>
                <td><?php echo $ctr++;?></td>
                <td><?php echo $thActionRow->action_text;?></td>
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
        var idVal = $(this).attr('id');
        var divId = "editThisThActionDiv" + idVal;
        $('#' + divId).load('files/showeditfieldsofthisthaction.php?thActionId='+idVal);
    });
  });//end document.ready function
</script>
