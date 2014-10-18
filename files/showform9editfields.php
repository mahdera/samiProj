<?php
	$id = $_GET['id'];
	require_once 'form9.php';
	$form9Obj = getForm9($id);
	//define the control names in here...
	$q91TextAreaControlName = "q9_1" . $id;	
	$buttonId = "btnupdateform9" . $id;
?>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q9.1:</td>
            <td>
                <textarea name="<?php echo $q91TextAreaControlName;?>" id="<?php echo $q91TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo $form9Obj->q9_1;?></textarea>
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
		var buttonId = "btnupdateform9" + id;
		
		$('#'+buttonId).click(function(){			
			var divId = "form9EditDiv" + id;
			var q91TextAreaControlName = "q9_1" + id;			
			//now get the values...
			var q91Value = $('#'+q91TextAreaControlName).val();			
			var dataString = "id="+id+"&q91Value="+q91Value;
			$.ajax({
                url: 'files/updateform9.php',        
                data: dataString,
                type:'POST',
                success:function(response){ 
                    $('#'+divId).html(response);
                },
                error:function(error){
                    alert(error);
                }
            });
		});
	});//end document.ready function
</script>