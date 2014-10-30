<?php session_start();?>
<div>
    <?php
        //now display the saved data back to the user...
        //require_once 'dbconnection.php';
        require_once 'risk.php';
        require_once 'th.php';
        $riskList = null;
        //var_dump($_SESSION['SELECTED_THS']);
        //if session containing list of selected checkboxes is empty...then read from database
        if($_SESSION['SELECTED_THS'] !== NULL){
          //echo 'inside most fancy place';
          $selectedThIdArray = $_SESSION['SELECTED_THS'];
        }
        $riskList = getAllRisksModifiedBy($_SESSION['LOGGED_USER_ID']);

        if(!empty($riskList)){
            ?>
                <table border="0" width="100%">
                    <tr style="background: #ccc">
                        <td>#</td>
                        <td>Th</td>
                        <td>MG</td>
                        <td>DR</td>
                        <td>PR</td>
                        <td>WA</td>
                        <td>RS</td>
                        <td>Select</td>
                    </tr>
                    <?php
                        $ctr=1;
                        while($riskRow = mysql_fetch_object($riskList)){
                            $thObj = getTh($riskRow->th_id);
                            ?>
                            <tr>
                                <td><?php echo $ctr;?></td>
                                <td><?php echo $thObj->th_name;?></td>
                                <td><?php echo $riskRow->mg;?></td>
                                <td><?php echo $riskRow->dr;?></td>
                                <td><?php echo $riskRow->pr;?></td>
                                <td><?php echo $riskRow->wa;?></td>
                                <td><?php echo $riskRow->rs;?></td>
                                <td align="center">
                                    <?php
                                        $thSelected = false;
                                        $chkName = "chk_" . $ctr;
                                        for($i=0; $i<count($selectedThIdArray); $i++){
                                          if($selectedThIdArray[$i] === $riskRow->th_id){
                                            $thSelected = true;
                                            //break;
                                          }
                                        }//end for loop
                                        if($thSelected){
                                          ?>
                                            <input type="checkbox" class="checkBoxSelection" name="<?php echo $chkName;?>" checked="checked" id="<?php echo $chkName;?>" value="<?php echo $thObj->id;?>"/>
                                          <?php
                                        }else{
                                          ?>
                                            <input type="checkbox" class="checkBoxSelection" name="<?php echo $chkName;?>" id="<?php echo $chkName;?>" value="<?php echo $thObj->id;?>"/>
                                          <?php
                                        }
                                        //
                                    ?>
                                </td>
                            </tr>
                            <?php
                            $ctr++;
                        }//end while loop
                    ?>
                </table>
            <?php
        }
?>
</div>
