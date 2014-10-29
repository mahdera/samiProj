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
    </tr>
    <?php
      $ctr=1;
      while($thActionRow = mysql_fetch_object($thActionList)){
        ?>
          <tr>
            <td><?php echo $ctr++;?></td>
            <td><?php echo $thActionRow->action_text;?></td>
          </tr>
        <?php
      }//end while loop
    ?>
</table>
