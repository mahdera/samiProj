<h2>Form 2</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q2.1:</td>
            <td>
                <textarea name="q2_1" id="q2_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td>Q2.2:</td>
            <td>
                <textarea name="q2_2" id="q2_2" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td>Q2.3:</td>
            <td>
                <textarea name="q2_3" id="q2_3" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr style="visibility:hidden">
            <td>Q2.4:</td>
            <td>
                <textarea name="q2_4" id="q2_4" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform2"/>
            </td>
        </tr>
    </table>
</form>
<div id="form2ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        //showListOfForm2Records();

        $('#btnsaveform2').click(function(){
            var q2_1 = $('#q2_1').val();
            var q2_2 = $('#q2_2').val();
            var q2_3 = $('#q2_3').val();
            var q2_4 = $('#q2_4').val();

            if(true){
                var dataString = "q2_1="+q2_1+"&q2_2="+q2_2+"&q2_3="+q2_3+
                        "&q2_4="+q2_4;
                $.ajax({
                    url: 'files/saveform2.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        //alert('Form Two Saved Successfully!');
                        $('#form2Div').html('<div class="notify notify-green"><span class="symbol icon-tick"></span> Saved Successfully</div>');
                        clearInputFields();
                        showListOfForm2Records();
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }else{
                alert("Please enter all the input fields");
            }
        });

        function clearInputFields(){
            $('#q2_1').val('');
            $('#q2_2').val('');
            $('#q2_3').val('');
            $('#q2_4').val('');
        }



        function showListOfForm2Records(){
            $('#form2ManagementDetailDiv').load('files/showlistofform2records.php');
        }

    });//end document.ready function
</script>
