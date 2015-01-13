<?php
	$id = $_GET['id'];
	require_once 'form3.php';
	$form3Obj = getForm3($id);
	//define the control names in here...
	$q31TextAreaControlName = "q3_1" . $id;
	$buttonId = "btnupdateform3" . $id;
?>
<form>
    <table border="0" width="100%" style="padding: 5px">
        <tr>
            <td>Q3.1:</td>
            <td>
                <textarea name="<?php echo $q31TextAreaControlName;?>" id="<?php echo $q31TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form3Obj->q3_1);?></textarea>
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
		var buttonId = "btnupdateform3" + id;

		$('#'+buttonId).click(function(){
			var divId = "form3EditDiv" + id;
			var q31TextAreaControlName = "q3_1" + id;
			//now get the values...
			var q31Value = $('#'+q31TextAreaControlName).val();
			var dataString = "id="+id+"&q31Value="+q31Value;
			$.ajax({
                url: 'files/updateform3.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    //$('#'+divId).html(response);
										$('#form3Div').load('files/showlistofform3records.php',{noncache: new Date().getTime()});
                },
                error:function(error){
                    alert(error);
                }
            });
		});
	});//end document.ready function
</script>
