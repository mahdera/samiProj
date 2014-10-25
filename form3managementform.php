<h2>Form 3</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q3.1:</td>
            <td>
                <textarea name="q3_1" id="q3_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform3"/>
            </td>
        </tr>
    </table>
</form>
<div id="form3ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){
        showListOfForm3Records();
        $('#btnsaveform3').click(function(){
            var q3_1 = $('#q3_1').val();

            if(true){
                var dataString = "q3_1="+q3_1;
                $.ajax({
                    url: 'files/saveform3.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        //alert('Form Three Saved Successfully!');
                        $('#form3Div').html('<div class="notify notify-green"><span class="symbol icon-tick"></span> Form Three Saved Successfully!</div>');
                        clearInputFields();
                        showListOfForm3Records();
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }else{
                alert("Please enter value in the input field");
            }
        });

        function showListOfForm3Records(){
            $('#form3ManagementDetailDiv').load('files/showlistofform3records.php');
        }

        function clearInputFields(){
            $('#q3_1').val('');
        }
    });//end document.ready function
</script>
