<h2>Form 6</h2>
<form>
    <table border="1" width="100%">
        <tr>
            <td>Q6.1:</td>
            <td>
                <textarea name="q6_1" id="q6_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>        
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsave"/>
                <input type="reset" value="Clear"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){       
        $('#btnsave').click(function(){
            var q6_1 = $('#q6_1').val();
                        
            if(q6_1 !== ""){
                var dataString = "q6_1="+q6_1;
                $.ajax({
                    url: 'files/saveform6.php',        
                    data: dataString,
                    type:'POST',
                    success:function(response){                     
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
            $('#q6_1').val('');            
        }
    });//end document.ready function
</script>