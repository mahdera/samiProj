<form style="background: #eee">
    <table border="0" width="100%">
        <tr>
            <td>Fn Name:</td>
            <td>
                <input type="text" name="txtg3fn1name" id="txtg3fn1name"/>
            </td>
            <td>
                <input type="button" value="Save Fn" id="btnsaveg3fn1"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnsaveg3fn1').click(function(){
            var fnName = $('#txtg3fn1name').val();
            if(fnName !== ""){
                var dataString = "fnName="+encodeURIComponent(fnName);
                $.ajax({
                    url: 'files/savefn.php',		
                    data: dataString,
                    type:'POST',
                    success:function(response){                        
                        $('#g3fnObjOtherDiv').html(response);
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });
    });//end document.ready function
</script>