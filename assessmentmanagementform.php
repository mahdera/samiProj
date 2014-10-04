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
                <input type="text" id="datepicker" />
            </td>
        </tr>
        <tr id="thRow1">
            <td>Th1:</td>
            <td>
                <input type="text1" name="txtth1" id="txtth1" class="thInputRow"/> [ <a href="#.php" id="addMoreThLink">Add More</a> | <a href="#.php" id="removeThRowLink">Remove</a> ]
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
<hr/>

<div id="subDetailDiv"></div>

<script type="text/javascript">
    $(document).ready(function(){        
        
        $( "#datepicker" ).datepicker({
            changeMonth: true,//this option for allowing user to select month
            changeYear: true //this option for allowing user to select from year range
        });
        
        showListOfAssessments();
        
        $('#addMoreThLink').click(function(){
            var numItems = $('.thInputRow').length;
            var textBoxId = "txtth"+(numItems+1);
            var newRow = $("<tr id='thRow"+(numItems+1)+"'><td>Th"+(numItems+1)+":</td><td><input type='text' class='thInputRow' name='"+textBoxId+"' id='"+textBoxId+"'/></td></tr>");
            $('#thRow'+numItems).after(newRow);
        });
        
        $('#removeThRowLink').click(function(){
            var numItems = $('.thInputRow').length;
            if(numItems > 1){
                var thRowId = 'thRow'+numItems;            
                $('#'+thRowId).remove();
            }
        });
        
        $('#btnsave').click(function(){
            var assessmentType = $('#slctassessmenttype').val();
            var assessmentDate = $('#datepicker').val();
            var numItems = $('.thInputRow').length;
            var th1 = $('#txtth1').val();
            var summary = $('#textareasummary').val();
            
            if(assessmentType !== "" && assessmentDate !== "" && th1 !== ""){
                var dataString = "assessmentType="+assessmentType+
                        "&assessmentDate="+assessmentDate+"&summary="+encodeURIComponent(summary)+
                        "&numItems="+numItems;
                
                for(var i=1; i <= numItems; i++){
                    var textBoxId = "txtth"+i;
                    var textBoxValue = $('#'+textBoxId).val();
                    dataString+="&"+textBoxId+"="+encodeURIComponent(textBoxValue);
                }//end for loop
                
                $.ajax({
                    url: 'files/saveassessment.php',		
                    data: dataString,
                    type:'POST',
                    success:function(response){                        
                        clearFormInputFields(); 
                        showListOfAssessments();
                    },
                    error:function(error){
                        alert(error);
                    }
                });
                
            }else{
                alert('Please enter all the necessary data values into the form!');
            }    
        });   
        
        function clearFormInputFields(){
            $('#slctassessmenttype').val('');
            $('#datepicker').val('');            
            $('#txtth1').val('');
            $('#textareasummary').val('');
        }
        
        function showListOfAssessments(){
            $('#subDetailDiv').load('files/showlistofassessments.php');
        }
        
    });//end document.ready function
</script>