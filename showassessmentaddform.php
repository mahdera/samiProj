<?php
  error_reporting( 0 );
?>
<form id="assessmentManagementForm">
    <table border="0" width="99%">
        <tr>
            <td>Assessment Type:</td>
            <td>
                <select name="slctassessmenttype" id="slctassessmenttype" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <option value="as1">as1</option>
                    <option value="as2">as2</option>
                    <option value="as3">as3</option>
                    <option value="as4">as4</option>
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
</form>
