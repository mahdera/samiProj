<?php
  error_reporting( 0 );
?>
<h1>Add Assessment</h1>
<a href="#.php" id="showAssessmentManagementFormLinkId">Show Form</a>
|
<a href="#.php" id="hideAssessmentManagementFormLinkId">Hide Form</a>
<div id="assessmentManagementDiv">
    <?php
        require_once 'showassessmentaddform.php';
    ?>
</div>

<hr/>

<div id="subDetailDiv"></div>

<script type="text/javascript">
    $(document).ready(function(){

        $('#assessmentManagementForm').hide();

        $('#showAssessmentManagementFormLinkId').click(function(){
            $('#assessmentManagementForm').show('slow');
        });

        $('#hideAssessmentManagementFormLinkId').click(function(){
            $('#assessmentManagementForm').hide('slow');
        });

        $( ".datepicker" ).datepicker({
            changeMonth: true,//this option for allowing user to select month
            changeYear: true, //this option for allowing user to select from year range
            dateFormat: 'yy-mm-dd'
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
                var dataString = "assessmentType="+encodeURIComponent(assessmentType)+
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
                        $('#assessmentManagementDiv').load('showassessmentaddform.php');
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
