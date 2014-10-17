<h2>Form 5</h2>
<form>
    <table border="1" width="100%">
        <tr>
            <td>Q5.1:</td>
            <td>
                <textarea name="q5_1" id="q5_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>        
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsave"/>                
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){       
        $('#btnsave').click(function(){
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
    });//end document.ready function
</script>