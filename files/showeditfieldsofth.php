<?php
    $id = $_GET['id'];
    require_once 'th.php';
    $thObj = getTh($id);
    //now define the control names
    $thControlName = "txteditth" . $id;
    $buttonId = "btnupdate" . $id;
?>
<h2>Edit Th</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Th:</td>
            <td>
                <input type="text" name="<?php echo $thControlName;?>" id="<?php echo $thControlName;?>" value="<?php echo $thObj->th_name;?>" size="100"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
            </td>
        </tr>
    </table>
</form>
<hr/>
<script type="text/javascript">
    $(document).ready(function(){
        var id = "<?php echo $id;?>";
        //define the controls here...
        var thControlName = "txteditth" + id;
        var buttonId = "btnupdate" + id;

        $('#'+buttonId).click(function(){
            var thName = $('#'+thControlName).val();
            if(thName !== ""){
                var dataString = "id="+id+"&thName="+encodeURIComponent(thName);
                var divId = "thEditDiv" + id;
                $.ajax({
                    url: 'files/updateth.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('#'+divId).html(response);
                        $('#subDetailDiv').load('files/showlistofths.php');
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });

    });//end document.ready function
</script>
