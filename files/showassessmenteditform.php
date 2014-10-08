<?php
    require_once 'assessment.php';
    require_once 'th.php';
    $id = $_GET['id'];
    $assessmentObj = getAssessment($id);
    //now define the control names in here...
    $assessmentTypeControlName = "slctassessmenttype" . $id;
    $assessmentDateControlName = "datepicker" . $id;    
    $summaryControlName = "textareasummary" . $id;
    $buttonId = "btnupdate" . $id;
?>
<h2>Edit Assessment</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Assessment Type:</td>
            <td>
                <select name="<?php echo $assessmentTypeControlName;?>" id="<?php echo $assessmentTypeControlName;?>" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        if($assessmentObj->assessment_type === "as1"){
                            ?>
                                <option value="as1" selected="selected">as1</option>
                                <option value="as2">as2</option>
                                <option value="as3">as3</option>
                                <option value="as4">as4</option>
                            <?php
                        }else if($assessmentObj->assessment_type === "as2"){
                            ?>
                                <option value="as1">as1</option>
                                <option value="as2" selected="selected">as2</option>
                                <option value="as3">as3</option>
                                <option value="as4">as4</option>
                            <?php
                        }else if($assessmentObj->assessment_type === "as3"){
                            ?>
                                <option value="as1">as1</option>
                                <option value="as2">as2</option>
                                <option value="as3" selected="selected">as3</option>
                                <option value="as4">as4</option>
                            <?php
                        }else if($assessmentObj->assessment_type === "as4"){
                            ?>
                                <option value="as1">as1</option>
                                <option value="as2">as2</option>
                                <option value="as3">as3</option>
                                <option value="as4" selected="selected">as4</option>
                            <?php
                        }else{
                            ?>
                                <option value="as1">as1</option>
                                <option value="as2">as2</option>
                                <option value="as3">as3</option>
                                <option value="as4">as4</option>
                            <?php
                        }
                    ?>                    
                </select>
            </td>
        </tr>
        <tr>
            <td>Date:</td>
            <td>
                <input type="text" name="<?php echo $assessmentDateControlName;?>" id="<?php echo $assessmentDateControlName;?>" class="datepicker" value="<?php echo $assessmentObj->assessment_date;?>"/>
            </td>
        </tr>
        <tr id="thRow1">
            <td>Th</td>
            <td>
                <table border="1" width="100%">
                    <tr>
                        <td>Ser.No</td>
                        <td>Th Name</td>
                    </tr>
                    <?php
                        $thList = getAllThsForThisAssessment($id);
                        $rowCtr=1;
                        while($thRow = mysql_fetch_object($thList)){
                            $thControlName = "txteditth" . $id . $rowCtr;
                            ?>
                            <tr>
                                <td><?php echo $rowCtr;?></td>
                                <td>
                                    <input type="text" name="<?php echo $thControlName;?>" id="<?php echo $thControlName;?>" value="<?php echo $thRow->th_name;?>"/>
                                </td>
                            </tr>
                            <?php
                            $rowCtr++;
                        }//end while loop
                    ?>
                </table>
            </td>
        </tr>
        <tr>
            <td>Summary:</td>
            <td>
                <textarea name="<?php echo $summaryControlName;?>" id="<?php echo $summaryControlName;?>" style="width: 100%" rows="3"><?php echo $assessmentObj->summary;?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
                <input type="reset" value="Clear"/>
            </td>            
        </tr>        
    </table>
</form>
<hr/>
<script type="text/javascript">
    $(document).ready(function(){
        
        $( ".datepicker" ).datepicker({
            changeMonth: true,//this option for allowing user to select month
            changeYear: true //this option for allowing user to select from year range
        });
        
        var id = "<?php echo $id;?>";
        var buttonId = "btnupdate" + id;
        
        $('#'+buttonId).click(function(){
            //redefine the controls in here...
            var assessmentTypeControlName = "slctassessmenttype" + id;
            var assessmentDateControlName = "datepicker" + id;    
            var summaryControlName = "textareasummary" + id;
            var ctr = "<?php echo $rowCtr-1;?>";
            //now get the values for the non-iterative controls in here...
            var assessmentTypeControlValue = $('#'+assessmentTypeControlName).val();
            var assessmentDateControlValue = $('#'+assessmentDateControlName).val().trim();
            var summaryControlValue = $('#'+summaryControlName).val();
            var dataString = "assessmentType="+encodeURIComponent(assessmentTypeControlValue)+
                    "&assessmentDate="+assessmentDateControlValue+"&summary="+encodeURIComponent(summaryControlValue)+
                    "&id="+id;
            for(var i=1; i <= ctr; i++){
                var thControlName = "txteditth" + id + i;
                var thControlValue = $('#'+thControlName).val();
                dataString += "&"+thControlName+"="+thControlValue;
            }
            //now it is looking great...i can continue working on the save part...
            $.ajax({
                url: 'files/updateassessment.php',		
                data: dataString,
                type:'POST',
                success:function(response){                        
                    //clearFormInputFields(); 
                    //showListOfAssessments();
                },
                error:function(error){
                    alert(error);
                }
            });
        });//end button.click function
        
    });//end document.ready function
</script>
