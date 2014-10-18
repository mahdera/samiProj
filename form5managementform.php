<h2>Form 5</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q5.1:</td>
            <td>
                <textarea name="q5_1" id="q5_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>        
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform5"/>                
            </td>
        </tr>
    </table>
</form>
<div id="form5ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){ 

        showListOfForm5Records();

        $('#btnsaveform5').click(function(){
            var q5_1 = $('#q5_1').val();
                        
            if(q5_1 !== ""){
                var dataString = "q5_1="+q5_1;
                $.ajax({
                    url: 'files/saveform5.php',        
                    data: dataString,
                    type:'POST',
                    success:function(response){  
                        alert('Form Five Saved Successfully!');                   
                        clearInputFields();
                        showListOfForm5Records();
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
            $('#q5_1').val('');            
        }

        function showListOfForm5Records(){
            $('#form5ManagementDetailDiv').load('files/showlistofform5records.php');
        }

    });//end document.ready function
</script>