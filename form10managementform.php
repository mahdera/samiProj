<h2>Form 10</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q10.1:</td>
            <td>
                <textarea name="q10_1" id="q10_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform10"/>
            </td>
        </tr>
    </table>
</form>
<div id="form10ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        showListOfForm10Records();

        $('#btnsaveform10').click(function(){
            var q10_1 = $('#q10_1').val();

            if(q10_1 !== ""){
                var dataString = "q10_1="+q10_1;
                $.ajax({
                    url: 'files/saveform10.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        //alert('Form 10 Saved Successfully!');
                        $('#form10Div').html('<div class="notify notify-green"><span class="symbol icon-tick"></span> Form Ten Saved Successfully!</div>');
                        clearInputFields();
                        showListOfForm10Records();
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
            $('#q10_1').val('');
        }

        function showListOfForm10Records(){
            $('#form10ManagementDetailDiv').load('files/showlistofform10records.php');
        }

    });//end document.ready function
</script>
