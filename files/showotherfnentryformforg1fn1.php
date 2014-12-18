<form style="background: #eee">
    <table border="0" width="100%">
        <tr>
            <td>Fn Name:</td>
            <td>
                <input type="text" name="txtg1fn1name" id="txtg1fn1name"/>
            </td>
            <td>
                <input type="button" value="Save Fn" id="btnsaveg1fn1"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnsaveg1fn1').click(function(){
            var fnName = $('#txtg1fn1name').val();
            if(fnName !== ""){
                var dataString = "fnName="+encodeURIComponent(fnName);
                $.ajax({
                    url: 'files/savefn.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('#g1fnObjOtherDiv').html(response);
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });
    });//end document.ready function
</script>
