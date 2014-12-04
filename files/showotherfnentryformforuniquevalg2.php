<?php
    $uniqueVal = $_GET['uniqueVal'];
    //txtg1fnname
    //define the unique fn box here
    $fnBoxName = "txtg2fnobjother" . $uniqueVal;
    $buttonId = "btnupdateg2fnobjother" . $uniqueVal;
?>
<form style="background: #eee">
    <table border="0" width="100%">
        <tr>
            <td>Fn Name:</td>
            <td>
                <input type="text" name="<?php echo $fnBoxName;?>" id="<?php echo $fnBoxName;?>"/>
            </td>
            <td>
                <input type="button" value="Save Fn" id="<?php echo $buttonId;?>"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        var uniqueId = "<?php echo $uniqueVal;?>";
        var buttonId = "btnupdateg2fnobjother" + uniqueId;

        $('#'+buttonId).click(function(){
            var textBoxId = "txtg2fnobjother" + uniqueId;
            var fnName = $('#'+textBoxId).val();
            if(fnName !== ""){
                var dataString = "fnName="+encodeURIComponent(fnName);
                var fnOtherDivId = "fnOtherG2ObjFn" + uniqueId;
                $.ajax({
                    url: 'files/savefn.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('#'+fnOtherDivId).html(response);
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });
    });//end document.ready function
</script>
