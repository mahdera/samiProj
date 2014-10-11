<?php
    $thActionId = $_GET['thId'];
    require_once 'thaction.php';
    $thActionObj = getThAction($thActionId);
    $thEditActionText = "thEditActionText" . $thActionId;
    $buttonId = "updateThActionButton" . $thActionId;
?>
here
<form>
    <table border="0" width="100%">
        <tr>
            <td width="10%">Th Action:</td>
            <td>
                <textarea name="<?php echo $thEditActionText;?>" id="<?php echo $thEditActionText;?>" style="width: 100%" rows="3"><?php echo $thActionObj->action_text;?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
                <input type="reset" value="Undo"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        var thActionId = "<?php echo $thActionId;?>";
        //now create the button id here using the actionId i got...
        var buttonId = "updateThActionButton" + thActionId;
        
        $('#'+buttonId).click(function(){
            //now get the update text value..
            var textAreaId = "thEditActionText" + thActionId;
            //get the value of the textarea using the textId you just created...
            var textAreaValue = $('#'+textAreaId).val();
            var divId = "editActionTextDiv" + thActionId;
            
            if(textAreaValue !== ""){
                var dataString = "updatedText="+textAreaValue+"&thActionId="+thActionId;
                $.ajax({
                    url: 'files/updatethaction.php',        
                    data: dataString,
                    type:'POST',
                    success:function(response){                     
                        $('#'+divId).html(response);
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }else{
                alert("You need to enter the th action text!");
            }
        });
    });//end document.ready fucntion
</script>