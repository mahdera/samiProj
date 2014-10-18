<h2>Form 8</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q8.1:</td>
            <td>
                <textarea name="q8_1" id="q8_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>        
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform8"/>                
            </td>
        </tr>
    </table>
</form>
<div id="form8ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){       

        showListOfForm8Records();

        $('#btnsaveform8').click(function(){
            var q8_1 = $('#q8_1').val();
                        
            if(q8_1 !== ""){
                var dataString = "q8_1="+q8_1;
                $.ajax({
                    url: 'files/saveform8.php',        
                    data: dataString,
                    type:'POST',
                    success:function(response){ 
                        alert('Form Eight Saved Successfully!');                    
                        clearInputFields();
                        showListOfForm8Records();
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
            $('#q8_1').val('');            
        }

        function showListOfForm8Records(){
            $('#form8ManagementDetailDiv').load('files/showlistofform8records.php');
        }

    });//end document.ready function
</script>