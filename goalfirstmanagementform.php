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
                                            <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
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
                                            <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
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
                                            <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
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