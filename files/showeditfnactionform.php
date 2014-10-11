<?php
    $fnActionId = $_GET['id'];
    require_once 'fnaction.php';
    $fnActionObj = getFnAction($fnActionId);
    //var_dump($fnActionObj);
    $fnEditActionText = "fnEditActionText" . $fnActionId;
    $buttonId = "updateFnActionButton" . $fnActionId;
?>
<form>
    <table border="0" width="100%">
        <tr>
            <td width="10%">Fn Action:</td>
            <td>
                <textarea name="<?php echo $fnEditActionText;?>" id="<?php echo $fnEditActionText;?>" style="width: 100%" rows="3"><?php echo $fnActionObj->action_text;?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="<?php echo $buttonId;?>"/>                
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        var fnActionId = "<?php echo $fnActionId;?>";
        //now create the button id here using the actionId i got...
        var buttonId = "updateFnActionButton" + fnActionId;
        
        $('#'+buttonId).click(function(){
            //now get the update text value..
            var textAreaId = "fnEditActionText" + fnActionId;
            //get the value of the textarea using the textId you just created...
            var textAreaValue = $('#'+textAreaId).val();
            var divId = "editActionTextDiv" + fnActionId;
            
            if(textAreaValue !== ""){
                var dataString = "updatedText="+textAreaValue+"&fnActionId="+fnActionId;
                $.ajax({
                    url: 'files/updatefnaction.php',        
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
                alert("You need to enter the fn action text!");
            }
        });
    });//end document.ready fucntion
</script>