<?php
    session_start();
?>
<div>
    <?php
        //now display the saved data back to the user...        
        require_once 'assessment.php';
        require_once 'th.php';
        
        $assessmentList = getAllAssessmentsModifiedBy($_SESSION['LOGGED_USER_ID']);
        if(!empty($assessmentList)){
            ?>
                <table border="0" width="100%">
                    <tr style="background: #ccc">
                        <td></td>                        
                        <td>Assessment Type</td>
                        <td>Assessment Date</td>
                        <td>Summary</td>                        
                        <td>Edit</td>
                        <td></td>
                    </tr>                    
                    <?php
                        $ctr=1;
                        while($assessmentRow = mysql_fetch_object($assessmentList)){                            
                            $divId = "assessmentEditDiv" . $assessmentRow->id;
                            ?>
                            <tr>
                                <td></td>
                                <td><?php echo $assessmentRow->assessment_type;?></td>
                                <td><?php echo $assessmentRow->assessment_date;?></td>
                                <td><?php echo $assessmentRow->summary;?></td>                                
                                <td>
                                    <a href="#.php" id="<?php echo $assessmentRow->id;?>" class="editAssessmentLink">Edit</a>
                                </td>
                                <td></td>
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
        }
    ?>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('.editAssessmentLink').click(function(){
            //get the id value
            var id = $(this).attr('id');
            var divId = "assessmentEditDiv" + id;
            $('#'+divId).load('files/showassessmenteditform.php?id='+id);
        });
        
    });//end document.ready function
</script>