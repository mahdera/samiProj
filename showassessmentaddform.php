<?php
  //error_reporting( 0 );
  require_once 'files/assessmentlookup.php';
?>
<form id="assessmentManagementForm">
    <fieldset>
      <legend>Add Assessment Form</legend>
    <table border="0" width="99%">
        <tr>
            <td width="15%">Assessment Type:</td>
            <td>
                <?php
                    $assessmentLookupList = getAllAssessmentLookUpValues();
                ?>
                <select name="slctassessmenttype" id="slctassessmenttype" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        while($assessmentLookupRow = mysql_fetch_object($assessmentLookupList)){
                          ?>
                              <option value="<?php echo $assessmentLookupRow->value;?>"><?php echo $assessmentLookupRow->value;?></option>
                          <?php
                        }//end while loop
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Date:</td>
            <td>
                <input type="text" name="datepicker" id="datepicker" class="datepicker"/>
            </td>
        </tr>
        <tr id="thRow1">
            <td>Th1:</td>
            <td>
                <input type="text" name="txtth1" id="txtth1" class="thInputRow"/> [ <a href="#.php" id="addMoreThLink">Add More</a> | <a href="#.php" id="removeThRowLink">Remove</a> ]
            </td>
        </tr>
        <tr>
            <td>Summary:</td>
            <td>
                <textarea name="textareasummary" id="textareasummary" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsave"/>
            </td>
        </tr>
    </table>
  </fieldset>
</form>
