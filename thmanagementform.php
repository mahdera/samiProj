<h1>Add Th</h1>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Th:</td>
            <td>
                <input type="text" name="txtth" id="txtth"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsave"/>                
            </td>
        </tr>
    </table>
</form>
<hr/>
<div id="subDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){
        //show the result back to the user on document.ready
        showListOfThs();
        
        $('#btnsave').click(function(){
            var thName = $('#txtth').val();
            
            if(thName !== ""){
                dataString = "thName="+thName;
                
                $.ajax({
                    url: 'files/saveth.php',		
                    data: dataString,
                    type:'POST',
                    success:function(response){                        
                        clearFormInputField(); 
                        showListOfThs();
                    },
                    error:function(error){
                        alert(error);
                    }
                });
                
            }
        });
        
        function clearFormInputField(){
            $('#txtth').val('');
        }
        
        function showListOfThs(){
            $('#subDetailDiv').load('files/showlistofths.php');
        }
        
    });//end document.ready function
</script>