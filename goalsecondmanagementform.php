<?php
    require_once 'files/th.php';
    require_once 'files/fn.php';
    
    //$fnList = getAllFnsModifiedBy($_SESSION['LOGGED_USER_ID']);
    
    $fnIdArray = array();
    //first read fns from tbl_goal_first_g1
    $fnIdArray = getAllFilteredLatestFnIdsEnteredByUser($_SESSION['LOGGED_USER_ID']);
    //var_dump($fnIdArray);
?>
<h1>Add Goal Second</h1>
<a href="#.php" id="showGoalSecondManagementFormLinkId">Show Form</a>
|
<a href="#.php" id="hideGoalSecondManagementFormLinkId">Hide Form</a>
<form id="goalSecondManagementForm">
    <table border="0" width="100%">
        <tr>
            <td>Fn:</td>
            <td>
                <select name="slctfn" id="slctfn" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>                    
                    <?php                    
                        //while($fnRow = mysql_fetch_object($fnList)){
                        foreach ($fnIdArray as $fnId) {    
                            $fnObj = getFn($fnId);                        
                            ?>
                                <option value="<?php echo $fnId;?>"><?php echo $fnObj->fn_name;?></option>
                            <?php
                        }//end foreach loop...
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>G1:</td>
            <td>
                <input type="text" name="txtg1" id="txtg1" class="g1Obj"/>
            </td>
        </tr>
        <tr>
            <td>Obj:</td>
            <td>
                <input type="text" name="txtg1obj1" id="txtg1obj1"/>
            </td>
        </tr>        
        <tr id="addMoreG1Obj">
            <td colspan="2" align="right">
                <a href="#.php" id="addMoreG1ObjLink">[Add More]</a> |
                <a href="#.php" id="removeG1ObjThRowLink">[Remove]</a>
            </td>
        </tr>
        <!--do the same thing for G2-->
        <tr>
            <td>G2:</td>
            <td>
                <input type="text" name="txtg2" id="txtg2" class="g2Obj"/>
            </td>
        </tr>
        <tr>
            <td>Obj:</td>
            <td>
                <input type="text" name="txtg2obj1" id="txtg2obj1"/>
            </td>
        </tr>        
        <tr id="addMoreG2Obj">
            <td colspan="2" align="right">
                <a href="#.php" id="addMoreG2ObjLink">[Add More]</a> |
                <a href="#.php" id="removeG2ObjThRowLink">[Remove]</a>
            </td>
        </tr> 
        <!--now do the same thing for G3-->
        <tr>
            <td>G3:</td>
            <td>
                <input type="text" name="txtg3" id="txtg3" class="g3Obj"/>
            </td>
        </tr>
        <tr>
            <td>Obj:</td>
            <td>
                <input type="text" name="txtg3obj1" id="txtg3obj1"/>
            </td>
        </tr>        
        <tr id="addMoreG3Obj">
            <td colspan="2" align="right">
                <a href="#.php" id="addMoreG3ObjLink">[Add More]</a> |
                <a href="#.php" id="removeG3ObjThRowLink">[Remove]</a>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsave"/>                
            </td>
        </tr>
    </table>
</form>
<hr/>
<div id="subDetailDiv"></div>
<script type="text/javascript">
    
    $(document).ready(function(){        
        
        $('#goalSecondManagementForm').hide();

        $('#showGoalSecondManagementFormLinkId').click(function(){
            $('#goalSecondManagementForm').show('slow');            
        });

        $('#hideGoalSecondManagementFormLinkId').click(function(){
            $('#goalSecondManagementForm').hide('slow');            
        });

        showListOfGoalSeconds();
        
        $('#btnsave').click(function(){
            //first get the static form values...
            var fn = $('#slctfn').val();
            var g1 = $('#txtg1').val();            
            var g1Obj1 = $('#txtg1obj1').val();            
            var g2 = $('#txtg2').val();            
            var g2Obj1 = $('#txtg2obj1').val();            
            var g3 = $('#txtg3').val();            
            var g3Obj1 = $('#txtg3obj1').val();            
            var isBlank = false;            
            
            if(fn !== "" && g1 !== "" && g1Obj1 !== "" && g2 !== "" && 
                    g2Obj1 !== "" && g3 !== "" && g3Obj1 !== ""){
                var dataString = "fn="+fn+"&g1="+encodeURIComponent(g1)+"&g1Obj1="+encodeURIComponent(g1Obj1)+"&g2="+encodeURIComponent(g2)+
                        "&g2Obj1="+encodeURIComponent(g2Obj1)+"&g3="+encodeURIComponent(g3)+"&g3Obj1="+encodeURIComponent(g3Obj1);
                //now I need to count how many new forms are added under G1, G2 and G3.
                var numItemsG1 = $('.g1Obj').length;
                var numItemsG2 = $('.g2Obj').length;
                var numItemsG3 = $('.g3Obj').length;
                
                for(var i = 1; i <= numItemsG1; i++){
                    var g1ObjTextBoxId = "txtg1obj" + i;
                    var g1ObjTextBoxValue = $('#' + g1ObjTextBoxId).val();                    
                    
                    if(g1ObjTextBoxValue !== ""){
                        dataString += "&" + g1ObjTextBoxId + "=" + encodeURIComponent(g1ObjTextBoxValue);
                        
                    }else{
                        isBlank = true;
                    }
                }//end for loop i

                //now do the same thing for g2...
                for(var j = 1; j <= numItemsG2; j++){
                    var g2ObjTextBoxId = "txtg2obj" + j;
                    var g2ObjTextBoxValue = $('#' + g2ObjTextBoxId).val();                  
                    
                    if(g2ObjTextBoxValue !== ""){
                        dataString += "&" + g2ObjTextBoxId + "=" + encodeURIComponent(g2ObjTextBoxValue);
                        
                    }else{
                        isBlank = true;
                    }
                }//end for loop j

                //now do the same thing for g3...
                for(var k = 1; k <= numItemsG3; k++){
                    var g3ObjTextBoxId = "txtg3obj" + k;
                    var g3ObjTextBoxValue = $('#' + g3ObjTextBoxId).val();                   
                    
                    if(g3ObjTextBoxValue !== ""){
                        dataString += "&" + g3ObjTextBoxId + "=" + encodeURIComponent(g3ObjTextBoxValue);
                        
                    }else{
                        isBlank = true;
                    }
                }//end for loop j

                //by now I have everything I need. So make sure the isBlank variable is not true and go ahead and save the information to the database.
                if(!isBlank){
                    dataString += "&numItemsG1="+numItemsG1+"&numItemsG2="+numItemsG2+"&numItemsG3="+numItemsG3;
                    $.ajax({
                        url: 'files/savegoalsecond.php',        
                        data: dataString,
                        type:'POST',
                        success:function(response){                        
                            clearFormInputField(); 
                            showListOfGoalSeconds();
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
            $('#slctfn').val('');
            $('#txtg1').val('');            
            $('#txtg1obj1').val('');            
            $('#txtg2').val('');            
            $('#txtg2obj1').val('');            
            $('#txtg3').val('');            
            $('#txtg3obj1').val('');
            
            var numItemsG1 = $('.g1Obj').length;
            var numItemsG2 = $('.g2Obj').length;
            var numItemsG3 = $('.g3Obj').length;

            for(var i=1; i <= numItemsG1; i++){
                var textBoxControlName = "txtg1obj" + i;                
                $('#' + textBoxControlName).val('');                
            }

            for(var j=1; j <= numItemsG2; j++){
                var textBoxControlName = "txtg2obj" + j;                
                $('#' + textBoxControlName).val('');                
            }

            for(var k=1; k <= numItemsG3; k++){
                var textBoxControlName = "txtg3obj" + j;                
                $('#' + textBoxControlName).val('');                
            }

        }
        
        function showListOfGoalSeconds(){
            $('#subDetailDiv').load('files/showlistofgoalseconds.php');
        }
        
        $('#addMoreG1ObjLink').click(function(){
            var numItems = $('.g1Obj').length;
            var dataString = "numItems="+numItems;            
            
            $.ajax({
                url: 'files/showmoreg1objform.php',		
                data: dataString,
                type:'POST',
                success:function(response){                        
                    $('#addMoreG1Obj').after(response);
                },
                error:function(error){
                    alert(error);
                }
            });
                        
        });
        
        $('#addMoreG2ObjLink').click(function(){
            var numItems = $('.g2Obj').length;
            var dataString = "numItems="+numItems;            
            
            $.ajax({
                url: 'files/showmoreg2objform.php',		
                data: dataString,
                type:'POST',
                success:function(response){                        
                    $('#addMoreG2Obj').after(response);
                },
                error:function(error){
                    alert(error);
                }
            });
                        
        });
        
        $('#addMoreG3ObjLink').click(function(){
            var numItems = $('.g3Obj').length;
            var dataString = "numItems="+numItems;            
            
            $.ajax({
                url: 'files/showmoreg3objform.php',		
                data: dataString,
                type:'POST',
                success:function(response){                        
                    $('#addMoreG3Obj').after(response);
                },
                error:function(error){
                    alert(error);
                }
            });
                        
        });
        
        $('#removeG1ObjThRowLink').click(function(){
            var numItems = $('.g1Obj').length;
            if(numItems > 1){
                var thRowId = 'trg1'+numItems;            
                $('#'+thRowId).remove();
            }
        });
        
        $('#removeG2ObjThRowLink').click(function(){
            var numItems = $('.g2Obj').length;
            if(numItems > 1){
                var thRowId = 'trg2'+numItems;            
                $('#'+thRowId).remove();
            }
        });
        
        $('#removeG3ObjThRowLink').click(function(){
            var numItems = $('.g3Obj').length;
            if(numItems > 1){
                var thRowId = 'trg3'+numItems;            
                $('#'+thRowId).remove();
            }
        });
        
    });//end document.ready function
    
</script>