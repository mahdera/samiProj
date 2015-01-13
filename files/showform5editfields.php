<?php
	$id = $_GET['id'];
	require_once 'form5.php';
	$form5Obj = getForm5($id);
	//define the control names in here...
	$q51TextAreaControlName = "q5_1" . $id;
	$buttonId = "btnupdateform5" . $id;
?>
<form>
    <table border="0" width="100%" style="padding:5px">
        <tr>
            <td>Q4.1:</td>
            <td>
                <textarea name="<?php echo $q51TextAreaControlName;?>" id="<?php echo $q51TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form5Obj->q5_1);?></textarea>
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
		var id = "<?php echo $id;?>";
		var buttonId = "btnupdateform5" + id;

		$('#'+buttonId).click(function(){
			var divId = "form5EditDiv" + id;
			var q51TextAreaControlName = "q5_1" + id;
			//now get the values...
			var q51Value = $('#'+q51TextAreaControlName).val();
			var dataString = "id="+id+"&q51Value="+q51Value;
			$.ajax({
                url: 'files/updateform5.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    //$('#'+divId).html(response);
										$('#form5Div').load('files/showlistofform5records.php',{noncache: new Date().getTime()});
                },
                error:function(error){
                    alert(error);
                }
            });
		});
	});//end document.ready function
</script>
