<form style="background: #eee">
    <table border="0" width="100%">
        <tr>
            <td>Fn Name:</td>
            <td>
                <input type="text" name="txtg1fnname" id="txtg1fnname"/>
            </td>
            <td>
                <input type="button" value="Save Fn" id="btnsaveg1fn"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnsaveg1fn').click(function(){
            var fnName = $('#txtg1fnname').val();
            if(fnName !== ""){
                var dataString = "fnName="+encodeURIComponent(fnName);
                $.ajax({
                    url: 'files/savefn.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('#g1fnOtherDiv').html(response);
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });
    });//end document.ready function
</script>
