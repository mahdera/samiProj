<div>
    <?php
        //now display the saved data back to the user...        
        require_once 'assessment.php';
        require_once 'th.php';
        
        $assessmentList = getAllAssessments();
        if(!empty($assessmentList)){
            ?>
                <table border="0" width="100%">
                    <tr style="background: #ccc">
                        <td>#</td>                        
                        <td>Assessment Type</td>
                        <td>Assessment Date</td>
                        <td>Summary</td>                        
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>                    
                    <?php
                        $ctr=1;
                        while($assessmentRow = mysql_fetch_object($assessmentList)){                            
                            ?>
                            <tr>
                                <td><?php echo $ctr++;?></td>
                                <td><?php echo $assessmentRow->assessment_type;?></td>
                                <td><?php echo $assessmentRow->assessment_date;?></td>
                                <td><?php echo $assessmentRow->summary;?></td>                                
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <table border="0" width="100%">
                                        <tr style="background: #eee">
                                            <td colspan="4">Th information associated with this assessment record</td>
                                        </tr>
                                        <tr style="background: lightyellow">
                                            <td>#</td>
                                            <td>Th Name</td>
                                            <td>Edit</td>
                                            <td>Delete</td>
                                        </tr>
                                        <?php
                                            $thList = getAllThsForThisAssessment($assessmentRow->id);
                                            $thCtr = 1;
                                            while($thRow = mysql_fetch_object($thList)){
                                               ?>
                                                <tr>
                                                    <td><?php echo $thCtr++;?></td>
                                                    <td><?php echo $thRow->th_name;?></td>
                                                    <td>Edit</td>
                                                    <td>Delete</td>                                                    
                                                </tr>
                                               <?php
                                            }//end while loop
                                        ?>
                                    </table>
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