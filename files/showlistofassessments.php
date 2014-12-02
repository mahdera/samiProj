<?php
    session_start();
?>
<div>
    <?php
        //now display the saved data back to the user...
        require_once 'assessment.php';
        require_once 'th.php';
        require_once 'user.php';
        require_once 'usersubdistrict.php';
        //require_once 'userzone.php';
        $userObj = getUser($_SESSION['LOGGED_USER_ID']);
        $assessmentList = null;
        /*if($userObj->user_level == 'Zone Level'){
            $userZoneObj = getZoneInfoForUser($userObj->id);
            $assessmentList = getAllAssessmentsModifiedByUsingUserLevel('Zone Level', $userZoneObj->zone_id);
        }*/
        if($userObj->user_level == '02'){
            $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
            $assessmentList = getAllAssessmentsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
        }else if($userObj->user_level == '01'){
          $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
          $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
          $assessmentList = getAllAssessmentsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
        }
        //$assessmentList = getAllAssessmentsModifiedBy($_SESSION['LOGGED_USER_ID']);
        if(mysql_num_rows($assessmentList)){
            ?>
                <table border="0" width="100%">
                    <tr style="background: #ccc">
                        <td>Assessment Type</td>
                        <td>Assessment Date</td>
                        <td>Th(s)</td>
                        <td>Summary</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                    <?php
                        $ctr=1;
                        while($assessmentRow = mysql_fetch_object($assessmentList)){
                            $divId = "assessmentEditDiv" . $assessmentRow->id;
                            ?>
                            <tr>
                                <td><?php echo $assessmentRow->assessment_type;?></td>
                                <td><?php echo $assessmentRow->assessment_date;?></td>
                                <td>
                                    <?php
                                      //now get all list of ths associated with this assessment.
                                      $thList = getAllThsForThisAssessment($assessmentRow->id);
                                      $thNameStr = null;
                                      while($thRow = mysql_fetch_object($thList)){
                                        //echo $thRow->th_name.", ";
                                        $thNameStr .= $thRow->th_name . ', ';
                                      }//end while loop
                                      echo rtrim($thNameStr, ', ');
                                    ?>
                                </td>
                                <td><?php echo $assessmentRow->summary;?></td>
                                <td>
                                    <a href="#.php" id="<?php echo $assessmentRow->id;?>" class="editAssessmentLink">Edit</a>
                                </td>
                                <td>
                                    <a href="#.php" id="<?php echo $assessmentRow->id;?>" class="deleteAssessmentLink">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <div id="<?php echo $divId;?>"></div>
                                </td>
                            </tr>
                            <?php
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
<script type="text/javascript">
    $(document).ready(function(){

        $('.editAssessmentLink').click(function(){
            var id = $(this).attr('id');
            var divId = "assessmentEditDiv" + id;
            $('#'+divId).load('files/showassessmenteditform.php?id='+id);
        });

        $('.deleteAssessmentLink').click(function(){
            var id = $(this).attr('id');
            if(window.confirm('Are you sure you want to delete this assessment record?')){
                var dataString = "id="+id;
                $.ajax({
                    url: 'files/deleteassessment.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        showListOfAssessments();
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });

        function showListOfAssessments(){
            $('#subDetailDiv').load('files/showlistofassessments.php');
        }

    });//end document.ready function
</script>
