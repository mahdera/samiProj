<?php
    require_once 'files/th.php';
    require_once 'files/fn.php';
    $thList = getAllThs();
    $fnList = getAllFns();
?>
<h2>Add Goal First</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Th:</td>
            <td>
                <select name="slctth" id="slctth" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>                    
                    <?php                    
                        while($thRow = mysql_fetch_object($thList)){
                            ?>
                                <option value="<?php echo $thRow->id;?>"><?php echo $thRow->th_name;?></option>
                            <?php
                        }//end while loop
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>G1:</td>
            <td>
                <input type="text" name="txtg1" id="txtg1"/>
            </td>
        </tr>
        <tr>
            <td>Fn:</td>
            <td>
                <select name="slctfn" id="slctfn" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        while($fnRow = mysql_fetch_object($fnList)){
                            ?>
                                <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                            <?php
                        }//end while loop
                        ?>
                                <option value="other">other</option>                        
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="fnOtherDiv"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsave"/>
                <input type="reset" value="Clear"/>
            </td>
        </tr>
    </table>
</form>
<hr/>
<div id="subDetailDiv"></div>
<script type="text/javascript">
    
    $(document).ready(function(){        
        //show the result back to the user on document.ready
        showListOfThs();
        
        $('#btnsave').click(function(){
            var thName = $('#txtth').val();
            
            if(thName !== ""){
                dataString = "thName="+thName;
                
                $.ajax({
                    url: 'files/saveth.php',		
                    data: dataString,
                    type:'POST',
                    success:function(response){                        
                        clearFormInputField(); 
                        showListOfThs();
                    },
                    error:function(error){
                        alert(error);
                    }
                });
                
            }
        });
        
        function clearFormInputField(){
            $('txtth').val('');
        }
        
        function showListOfThs(){
            $('#subDetailDiv').load('files/showlistofths.php');
        }
        
        $('#slctfn').change(function(){
            var fnVal = $(this).val();
            if(fnVal === "other"){
                $('#fnOtherDiv').load('files/showotherfnentryform.php');
            }else{
                $('#fnOtherDiv').html('');
            }
        });
        
    });//end document.ready function
    
</script>