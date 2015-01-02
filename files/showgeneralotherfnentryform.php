<?php
    $divId = $_GET['divId'];
?>
<form style="background: #eee">
    <table border="0" width="100%">
        <tr>
            <td>Fn Name:</td>
            <td>
                <input type="text" name="txtg2fnname" id="txtg2fnname"/>
            </td>
            <td>
                <input type="button" value="Save Fn" id="btnsavefn"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
$(document).ready(function(){
    var divId = "<?php echo $divId;?>";    
    $('#btnsavefn').click(function(){
        var fnName = $('#txtg2fnname').val();
        if(fnName !== ""){
            var dataString = "fnName="+encodeURIComponent(fnName);
            $.ajax({
                url: 'files/savefn.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    $('#'+divId).html(response);
                },
                error:function(error){
                    alert(error);
                }
            });
        }
    });
});//end document.ready function
</script>
