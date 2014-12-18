<?php
error_reporting( 0 );
?>
<h2>Form 7</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q7.1:</td>
            <td>
                <textarea name="q7_1" id="q7_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform7"/>
            </td>
        </tr>
    </table>
</form>
<div id="form7ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        showListOfForm7Records();

        $('#btnsaveform7').click(function(){
            var q7_1 = $('#q7_1').val();

            if(true){
                var dataString = "q7_1="+q7_1;
                $.ajax({
                    url: 'files/saveform7.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        //alert('Saved Successfully');
                        $('#form7Div').html('<div class="notify notify-green"><span class="symbol icon-tick"></span> Form Serven Saved Successfully!</div>');
                        clearInputFields();
                        showListOfForm7Records();
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }else{
                alert("Please enter value in the input field");
            }
        });

        function clearInputFields(){
            $('#q7_1').val('');
        }

        function showListOfForm7Records(){
            $('#form7ManagementDetailDiv').load('files/showlistofform7records.php');
        }

    });//end document.ready function
</script>
