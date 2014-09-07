<h2>Add Assessment</h2>
<form>
    <table border="0" width="100%">
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
                <input type="text" name="txtdate" id="txtdate" gldp-id="mydate" />
                <div gldp-el="mydate"
                    style="width:400px; height:300px; position:absolute; top:70px; left:100px;">
               </div>
            </td>
        </tr>
        <tr id="thRow">
            <td>Th1:</td>
            <td>
                <input type="text1" name="txtth1" id="txtth"/> <a href="#.php">Add More</a>
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
                <input type="reset" value="Clear"/>
            </td>            
        </tr>        
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){        
        
        $('#txtdate').Zebra_DatePicker();
        
        
        
    });//end document.ready function
</script>