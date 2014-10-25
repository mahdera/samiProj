<h2>Form 6</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q6.1:</td>
            <td>
                <textarea name="q6_1" id="q6_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform6"/>
            </td>
        </tr>
    </table>
</form>
<div id="form6ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        showListOfForm6Records();

        $('#btnsaveform6').click(function(){
            var q6_1 = $('#q6_1').val();

            if(true){
                var dataString = "q6_1="+q6_1;
                $.ajax({
                    url: 'files/saveform6.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        //alert('Form Six Saved Successfully!');
                        $('#form6Div').html('<div class="notify notify-green"><span class="symbol icon-tick"></span> Form Six Saved Successfully!</div>');
                        clearInputFields();
                        showListOfForm6Records();
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
            $('#q6_1').val('');
        }

        function showListOfForm6Records(){
            $('#form6ManagementDetailDiv').load('files/showlistofform6records.php');
        }

    });//end document.ready function
</script>
