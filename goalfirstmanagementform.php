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
                <select name="slctg1fn" id="slctg1fn" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        $fnList = getAllFns();
                        while($fnRow = mysql_fetch_object($fnList)){
                            ?>
                                <option value="<?php echo $fnRow->fn_name;?>"><?php echo $fnRow->fn_name;?></option>
                            <?php
                        }//end while loop
                        ?>
                                <option value="other">other</option>                        
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="g1fnOtherDiv"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table border="0" width="100%" style="background: lightyellow">
                    <tr>
                        <td>Obj:</td>
                        <td>
                            <input type="text" id="txtg1obj1" name="txtg1obj1" class="g1Obj"/>
                        </td>                        
                    </tr>
                    <tr>
                        <td>Fn:</td>
                        <td>
                            <select name="slctg1fn1" id="slctg1fn1" style="width: 100%">
                                <option value="" selected="selected">--Select--</option>                                
                                <?php
                                    $fnList = getAllFns();
                                    while($fnRow = mysql_fetch_object($fnList)){
                                        ?>
                                            <option value="<?php echo $fnRow->fn_name;?>"><?php echo $fnRow->fn_name;?></option>
                                        <?php
                                    }//end while loop
                                    ?>
                                            <!--<option value="other">other</option>-->                        
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr id="addMoreG1ObjFn">
            <td colspan="2" align="right">
                <a href="#.php" id="addMoreG1ObjFnLink">[Add More]</a> |
                <a href="#.php" id="removeG1ThRowLink">[Remove]</a>
            </td>
        </tr>
        <!--do the same thing for G2-->
        <tr>
            <td>G2:</td>
            <td>
                <input type="text" name="txtg2" id="txtg2"/>
            </td>
        </tr>
        <tr>
            <td>Fn:</td>
            <td>
                <select name="slctg2fn" id="slctg2fn" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        $fnList = getAllFns();
                        while($fnRow = mysql_fetch_object($fnList)){
                            ?>
                                <option value="<?php echo $fnRow->fn_name;?>"><?php echo $fnRow->fn_name;?></option>
                            <?php
                        }//end while loop
                        ?>
                                <option value="other">other</option>                        
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="g2fnOtherDiv"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table border="0" width="100%" style="background: lightyellow">
                    <tr>
                        <td>Obj:</td>
                        <td>
                            <input type="text" id="txtg2obj1" name="txtg2obj1" class="g2Obj"/>
                        </td>                        
                    </tr>
                    <tr>
                        <td>Fn:</td>
                        <td>
                            <select name="slctg2fn1" id="slctg2fn1" style="width: 100%">
                                <option value="" selected="selected">--Select--</option>
                                <?php
                                    $fnList = getAllFns();
                                    while($fnRow = mysql_fetch_object($fnList)){
                                        ?>
                                            <option value="<?php echo $fnRow->fn_name;?>"><?php echo $fnRow->fn_name;?></option>
                                        <?php
                                    }//end while loop
                                    ?>
                                            <!--<option value="other">other</option>-->                        
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr id="addMoreG2ObjFn">
            <td colspan="2" align="right">
                <a href="#.php" id="addMoreG2ObjFnLink">[Add More]</a> |
                <a href="#.php" id="removeG2ThRowLink">[Remove]</a>
            </td>
        </tr> 
        <!--now do the same thing for G3-->
        <tr>
            <td>G3:</td>
            <td>
                <input type="text" name="txtg3" id="txtg3"/>
            </td>
        </tr>
        <tr>
            <td>Fn:</td>
            <td>
                <select name="slctg3fn" id="slctg3fn" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        $fnList = getAllFns();
                        while($fnRow = mysql_fetch_object($fnList)){
                            ?>
                                <option value="<?php echo $fnRow->fn_name;?>"><?php echo $fnRow->fn_name;?></option>
                            <?php
                        }//end while loop
                        ?>
                                <option value="other">other</option>                        
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="g3fnOtherDiv"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table border="0" width="100%" style="background: lightyellow">
                    <tr>
                        <td>Obj:</td>
                        <td>
                            <input type="text" id="txtg3obj1" name="txtg3obj1" class="g3Obj"/>
                        </td>                        
                    </tr>
                    <tr>
                        <td>Fn:</td>
                        <td>
                            <select name="slctg3fn1" id="slctg3fn1" style="width: 100%">
                                <option value="" selected="selected">--Select--</option>
                                <?php
                                    $fnList = getAllFns();
                                    while($fnRow = mysql_fetch_object($fnList)){
                                        ?>
                                            <option value="<?php echo $fnRow->fn_name;?>"><?php echo $fnRow->fn_name;?></option>
                                        <?php
                                    }//end while loop
                                    ?>
                                            <!--<option value="other">other</option>-->                        
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr id="addMoreG3ObjFn">
            <td colspan="2" align="right">
                <a href="#.php" id="addMoreG3ObjFnLink">[Add More]</a> |
                <a href="#.php" id="removeG3ThRowLink">[Remove]</a>
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
        showListOfGoalFirsts();
        
        $('#btnsave').click(function(){
            //first get the static form values...
            var th = $('#slctth').val();
            var g1 = $('#txtg1').val();
            var g1Fn = $('#slctg1fn').val();
            var g1Obj1 = $('#txtg1obj1').val();
            var g1Fn1 = $('#slctg1fn1').val();
            var g2 = $('#txtg2').val();
            var g2Fn = $('#slctg2fn').val();
            var g2Obj1 = $('#txtg2obj1').val();
            var g2Fn1 = $('#slctg2fn1').val();
            var g3 = $('#txtg3').val();
            var g3Fn = $('#slctg3fn').val();
            var g3Obj1 = $('#txtg3obj1').val();
            var g3Fn1 = $('#slctg3fn1').val();
            var isBlank = false;            
            
            if(th !== "" && g1 !== "" && g1Fn !== "" && g1Obj1 !== "" && g1Fn1 !== "" && g2 !== "" && g2Fn !== "" &&
                    g2Obj1 !== "" && g2Fn1 !== "" && g3 !== "" && g3Fn !== "" && g3Obj1 !== "" && g3Fn1 !== ""){
                var dataString = "th="+th+"&g1="+encodeURIComponent(g1)+"&g1Fn="+encodeURIComponent(g1Fn)+"&g1Obj1="+encodeURIComponent(g1Obj1)+"&g1Fn1="+encodeURIComponent(g1Fn1)+"&g2="+encodeURIComponent(g2)+
                        "&g2Fn="+encodeURIComponent(g2Fn)+"&g2Obj1="+encodeURIComponent(g2Obj1)+"&g2Fn1="+encodeURIComponent(g2Fn1)+"&g3="+encodeURIComponent(g3)+"&g3Fn="+encodeURIComponent(g3Fn)+"&g3Obj1="+encodeURIComponent(g3Obj1)+"&g3Fn1="+encodeURIComponent(g3Fn1);
                //now I need to count how many new forms are added under G1, G2 and G3.
                var numItemsG1 = $('.g1Obj').length;
                var numItemsG2 = $('.g2Obj').length;
                var numItemsG3 = $('.g3Obj').length;
                
                for(var i = 2; i <= numItemsG1; i++){
                    var g1ObjTextBoxId = "txtg1obj" + i;
                    var g1ObjTextBoxValue = $('#' + g1ObjTextBoxId).val();
                    var g1FnSelectBoxId = "slctg1fn" + i;
                    var g1FnSelectBoxValue = $('#' + g1FnSelectBoxId).val();
                    if(g1ObjTextBoxValue !== "" && g1FnSelectBoxValue !== ""){
                        dataString += "&" + g1ObjTextBoxId + "=" + encodeURIComponent(g1ObjTextBoxValue) + "&" + g1FnSelectBoxId + "=" + encodeURIComponent(g1FnSelectBoxValue);
                        
                    }else{
                        isBlank = true;
                    }
                }//end for loop i

                //now do the same thing for g2...
                for(var j = 2; j <= numItemsG2; j++){
                    var g2ObjTextBoxId = "txtg2obj" + j;
                    var g2ObjTextBoxValue = $('#' + g2ObjTextBoxId).val();
                    var g2FnSelectBoxId = "slctg2fn" + j;
                    var g2FnSelectBoxValue = $('#' + g2FnSelectBoxId).val();
                    if(g2ObjTextBoxValue !== "" && g2FnSelectBoxValue !== ""){
                        dataString += "&" + g2ObjTextBoxId + "=" + encodeURIComponent(g2ObjTextBoxValue) + "&" + g2FnSelectBoxId + "=" + encodeURIComponent(g2FnSelectBoxValue);
                        
                    }else{
                        isBlank = true;
                    }
                }//end for loop j

                //now do the same thing for g3...
                for(var k = 2; k <= numItemsG3; k++){
                    var g3ObjTextBoxId = "txtg3obj" + k;
                    var g3ObjTextBoxValue = $('#' + g3ObjTextBoxId).val();
                    var g3FnSelectBoxId = "slctg3fn" + k;
                    var g3FnSelectBoxValue = $('#' + g3FnSelectBoxId).val();
                    if(g3ObjTextBoxValue !== "" && g3FnSelectBoxValue !== ""){
                        dataString += "&" + g3ObjTextBoxId + "=" + encodeURIComponent(g3ObjTextBoxValue) + "&" + g3FnSelectBoxId + "=" + encodeURIComponent(g3FnSelectBoxValue);
                        
                    }else{
                        isBlank = true;
                    }
                }//end for loop j

                //by now I have everything I need. So make sure the isBlank variable is not true and go ahead and save the information to the database.
                if(!isBlank){
                    dataString += "&numItemsG1="+numItemsG1+"&numItemsG2="+numItemsG2+"&numItemsG3="+numItemsG3;
                    $.ajax({
                        url: 'files/savegoalfirst.php',        
                        data: dataString,
                        type:'POST',
                        success:function(response){                        
                            clearFormInputField(); 
                            showListOfGoalFirsts();
                        },
                        error:function(error){
                            alert(error);
                        }
                    });
                }else{
                    alert('Missing data value. You are required to enter all the data values!');
                }
                
            }else{
                alert('Please enter all the necessary data values!');
            }           
            
        });
        
        function clearFormInputField(){
            $('#slctth').val('');
            $('#txtg1').val('');
            $('#slctg1fn').val('');
            $('#txtg1obj1').val('');
            $('#slctg1fn1').val('');
            $('#txtg2').val('');
            $('#slctg2fn').val('');
            $('#txtg2obj1').val('');
            $('#slctg2fn1').val('');
            $('#txtg3').val('');
            $('#slctg3fn').val('');
            $('#txtg3obj1').val('');
            $('#slctg3fn1').val('');
            var numItemsG1 = $('.g1Obj').length;
            var numItemsG2 = $('.g2Obj').length;
            var numItemsG3 = $('.g3Obj').length;

            for(var i=2; i <= numItemsG1; i++){
                var textBoxControlName = "txtg1obj" + i;
                var selectControlName = "slctg1fn" + i;
                $('#' + textBoxControlName).val('');
                $('#' + selectControlName).val('');
            }

            for(var j=2; j <= numItemsG2; j++){
                var textBoxControlName = "textg2obj" + j;
                var selectControlName = "slctg2fn" + j;
                $('#' + textBoxControlName).val('');
                $('#' + selectControlName).val('');
            }

            for(var k=2; k <= numItemsG3; k++){
                var textBoxControlName = "textg3obj" + j;
                var selectControlName = "slctg3fn" + j;
                $('#' + textBoxControlName).val('');
                $('#' + selectControlName).val('');
            }

        }
        
        function showListOfGoalFirsts(){
            $('#subDetailDiv').load('files/showlistofgoalfirsts.php');
        }
        
        $('#slctg1fn').change(function(){
            var fnVal = $(this).val();
            if(fnVal === "other"){
                $('#g1fnOtherDiv').load('files/showotherfnentryform.php');
            }else{
                $('#g1fnOtherDiv').html('');
            }
        });
        
        $('#slctg2fn').change(function(){
            var fnVal = $(this).val();
            if(fnVal === "other"){
                $('#g2fnOtherDiv').load('files/showg2otherfnentryform.php');
            }else{
                $('#g2fnOtherDiv').html('');
            }
        });
        
        $('#slctg3fn').change(function(){
            var fnVal = $(this).val();
            if(fnVal === "other"){
                $('#g3fnOtherDiv').load('files/showg3otherfnentryform.php');
            }else{
                $('#g3fnOtherDiv').html('');
            }
        });
        
        $('#addMoreG1ObjFnLink').click(function(){
            var numItems = $('.g1Obj').length;
            var dataString = "numItems="+numItems;            
            
            $.ajax({
                url: 'files/showmoreg1objfnform.php',		
                data: dataString,
                type:'POST',
                success:function(response){                        
                    $('#addMoreG1ObjFn').after(response);
                },
                error:function(error){
                    alert(error);
                }
            });
                        
        });
        
        $('#addMoreG2ObjFnLink').click(function(){
            var numItems = $('.g2Obj').length;
            var dataString = "numItems="+numItems;            
            
            $.ajax({
                url: 'files/showmoreg2objfnform.php',		
                data: dataString,
                type:'POST',
                success:function(response){                        
                    $('#addMoreG2ObjFn').after(response);
                },
                error:function(error){
                    alert(error);
                }
            });
                        
        });
        
        $('#addMoreG3ObjFnLink').click(function(){
            var numItems = $('.g3Obj').length;
            var dataString = "numItems="+numItems;            
            
            $.ajax({
                url: 'files/showmoreg3objfnform.php',		
                data: dataString,
                type:'POST',
                success:function(response){                        
                    $('#addMoreG3ObjFn').after(response);
                },
                error:function(error){
                    alert(error);
                }
            });
                        
        });
        
        $('#removeG1ThRowLink').click(function(){
            var numItems = $('.g1Obj').length;
            if(numItems > 1){
                var thRowId = 'trg1'+numItems;            
                $('#'+thRowId).remove();
            }
        });
        
        $('#removeG2ThRowLink').click(function(){
            var numItems = $('.g2Obj').length;
            if(numItems > 1){
                var thRowId = 'trg2'+numItems;            
                $('#'+thRowId).remove();
            }
        });
        
        $('#removeG3ThRowLink').click(function(){
            var numItems = $('.g3Obj').length;
            if(numItems > 1){
                var thRowId = 'trg3'+numItems;            
                $('#'+thRowId).remove();
            }
        });
        
    });//end document.ready function
    
</script>