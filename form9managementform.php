<h2>Form 9</h2>
<form>
    <table border="1" width="100%">
        <tr>
            <td>Q9.1:</td>
            <td>
                <textarea name="q9_1" id="q9_1" style="width: 100%" rows="3"></textarea>
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
    });//end document.ready function
</script>