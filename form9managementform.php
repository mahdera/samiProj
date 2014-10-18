<h2>Form 9</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q9.1:</td>
            <td>
                <textarea name="q9_1" id="q9_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>        
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform9"/>                
            </td>
        </tr>
    </table>
</form>
<div id="form9ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){       

        showListOfForm9Records();

        $('#btnsaveform9').click(function(){
            var q9_1 = $('#q9_1').val();
                        
            if(q9_1 !== ""){
                var dataString = "q9_1="+q9_1;
                $.ajax({
                    url: 'files/saveform9.php',        
                    data: dataString,
                    type:'POST',
                    success:function(response){                     
                        alert("Form Nine Saved Successfully!");
                        clearInputFields();
                        showListOfForm9Records();
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
            $('#q9_1').val('');            
        }

        function showListOfForm9Records(){
            $('#form9ManagementDetailDiv').load('files/showlistofform9records.php');
        }

    });//end document.ready function
</script>