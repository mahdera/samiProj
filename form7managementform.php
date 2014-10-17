<h2>Form 7</h2>
<form>
    <table border="1" width="100%">
        <tr>
            <td>Q7.1:</td>
            <td>
                <textarea name="q7_1" id="q7_1" style="width: 100%" rows="3"></textarea>
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
            var q7_1 = $('#q7_1').val();
                        
            if(q7_1 !== ""){
                var dataString = "q7_1="+q7_1;
                $.ajax({
                    url: 'files/saveform7.php',        
                    data: dataString,
                    type:'POST',
                    success:function(response){                     
                        alert('Form Seven Saved Successfully!');
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
            $('#q7_1').val('');            
        }
    });//end document.ready function
</script>