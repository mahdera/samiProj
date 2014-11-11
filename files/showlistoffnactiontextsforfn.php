<?php
    $fnId = $_GET['fnId'];
    require_once 'fnaction.php';
    //now get all thActions for
    $fnActionList = getAllFnActionsForThisFn($fnId);
?>
<table border="0" width="100%">
    <tr style="background:#ccc">
      <td width="10%">Ser.No</td>
      <td>Action Text</td>
    </tr>
    <?php
      $ctr=1;
      if(mysql_num_rows($fnActionList)){
          while($fnActionRow = mysql_fetch_object($fnActionList)){
            ?>
              <tr>
                <td><?php echo $ctr++;?></td>
                <td><?php echo $fnActionRow->action_text;?></td>
              </tr>
            <?php
          }//end while loop
      }else{
          ?>
          <tr>
              <td colspan="2">
                  <div class="notify notify-yellow"><span class="symbol icon-info"></span> No Action Texts Found!</div>
              </td>
          </tr>
          <?php
      }
    ?>
</table>
