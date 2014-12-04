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
      <td>Ser.No</td>
      <td>Action Text</td>
      <td>Delete</td>
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
                    <a href="#.php" id="<?php echo $thActionRow->id;?>" class="deleteThActionLinkId">Delete</a>
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
    $('.deleteThActionLinkId').click(function(){
      if(window.confirm('Are you sure you want to delete this record?')){
        var idVal = $(this).attr('id');
        var thId = "<?php echo $thId;?>";
        var divId = "actionDiv" + thId;
        $('#' + divId).load('files/deletethisthaction.php?thActionId='+idVal);
      }
    });
  });//end document.ready function
</script>
