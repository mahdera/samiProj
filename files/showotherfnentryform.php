<form style="background: #eee">
    <table border="0" width="100%">
        <tr>
            <td>Fn Name:</td>
            <td>
                <input type="text" name="txtfnname" id="txtfnname"/>
            </td>
            <td>
                <input type="button" value="Save Fn" id="btnsavefn"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnsavefn').click(function(){
            var fnName = $('#txtfnname').val();
            if(fnName !== ""){
                var dataString = "fnName="+encodeURIComponent(fnName);
                $.ajax({
                    url: 'files/savefn.php',		
                    data: dataString,
                    type:'POST',
                    success:function(response){                        
                        $('#fnOtherDiv').html(response);
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });
    });//end document.ready function
</script>