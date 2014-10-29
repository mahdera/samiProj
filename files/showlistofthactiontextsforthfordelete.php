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
      <td>Delete</td>
    </tr>
    <?php
      $ctr=1;
      while($thActionRow = mysql_fetch_object($thActionList)){
        ?>
          <tr>
            <td><?php echo $ctr++;?></td>
            <td><?php echo $thActionRow->action_text;?></td>
            <td>
                <a href="#.php" id="<?php echo $thActionRow->id;?>" class="deleteThActionLinkId">Delete</a>
            </td>
          </tr>
        <?php
      }//end while loop
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
