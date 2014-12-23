<div class="col-half left">
  <h1><a href="#.php" id="eddyMurphyLink">Th Check Boxes</a></h1>
  <div id="selectCheckBoxDiv">
    <?php
        require_once 'risk.php';
        require_once 'th.php';
        require_once 'user.php';
        require_once 'usersubdistrict.php';
        //require_once 'userdistrict.php';

        $userObj = getUser($_SESSION['LOGGED_USER_ID']);
        $riskList = null;
        /*if($userObj->user_level == 'Zone Level'){
            $userZoneObj = getZoneInfoForUser($userObj->id);
            $riskList = getAllRisksModifiedByUsingUserLevel('Zone Level', $userZoneObj->zone_id);
        }*/
        if($userObj->user_level == '02'){
            $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
            $riskList = getAllThsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
        }else if($userObj->user_level == '01'){
            $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
            if($userObj != null){
              $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
              $riskList = getAllThsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
            }
        }

        $selectedThIdArray = null;
        //var_dump($_SESSION['SELECTED_THS']);
        //if session containing list of selected checkboxes is empty...then read from database
        if($_SESSION['SELECTED_THS'] !== NULL){
          //echo 'inside most fancy place';
          $selectedThIdArray = $_SESSION['SELECTED_THS'];
        }

        //$riskList = getAllRisksModifiedBy($_SESSION['LOGGED_USER_ID']);

        if(!empty($riskList) && mysql_num_rows($riskList)){
            ?>
                <table border="1" width="100%" rules="all">
                    <tr style="background: #ccc">
                        <td>Th</td>
                        <!--<td>MG</td>
                        <td>DR</td>
                        <td>PR</td>
                        <td>WA</td>
                        <td>RS</td>-->
                        <td>Select</td>
                    </tr>
                    <?php
                        $ctr=1;
                        while($riskRow = mysql_fetch_object($riskList)){
                            //$thObj = getTh($riskRow->th_id);
                            $thObj = $riskRow;
                            ?>
                            <tr>
                                <td><?php echo $riskRow->th_name;//echo stripslashes($thObj->th_name);?></td>
                                <!--<td><?php //echo stripslashes($riskRow->mg);?></td>
                                <td><?php //echo stripslashes($riskRow->dr);?></td>
                                <td><?php //echo stripslashes($riskRow->pr);?></td>
                                <td><?php //echo stripslashes($riskRow->wa);?></td>
                                <td><?php //echo stripslashes($riskRow->rs);?></td>-->
                                <td align="center">
                                    <?php
                                        $thSelected = false;
                                        $chkName = "chk_" . $ctr;
                                        for($i=0; $i<count($selectedThIdArray); $i++){
                                          if($selectedThIdArray[$i] === $riskRow->id){
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
        }else{
        ?>
          <div class="notify notify-yellow"><span class="symbol icon-info"></span> No record found!</div>
        <?php
        }
?>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#selectCheckBoxDiv').show();

    $('#eddyMurphyLink').click(function(){
      $('#selectCheckBoxDiv').show('slow');
    });
  });//end document.ready function
</script>
