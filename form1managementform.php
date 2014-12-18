<?php
  session_start();
  require_once 'files/form1.php';
  require_once 'files/user.php';
  require_once 'files/usersubdistrict.php';

  $userObj = getUser($_SESSION['LOGGED_USER_ID']);
  //check if tbl_form_1 has record by any member of the sub district members of the logged in user...
  if($userObj->user_level == '02'){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $isForm1AlreadyFilled = checkIfForm1RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
  }else if($userObj->user_level == '01'){
    $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
    if(!empty($userObj)){
      $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
      $isForm1AlreadyFilled = checkIfForm1RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
    }
  }

  if(!$isForm1AlreadyFilled){
?>
<h2>Form 1</h2>
<form style="background:white" id="form1Entry">
    <table border="0" width="100%">
        <tr>
            <td>Title</td>
            <td>
                <input type="text" name="txttitle" id="txttitle"/>
            </td>
        </tr>
        <tr>
            <td>Date:</td>
            <td>
                <input type="text" id="datepicker" />
            </td>
        </tr>
        <tr>
            <td>Plan:</td>
            <td>
                <textarea name="textareaplan" id="textareaplan" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td>Q1:</td>
            <td>
                <textarea name="textareaq1" id="textareaq1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td>Q2:</td>
            <td>
                <textarea name="textareaq2" id="textareaq2" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td>Q3:</td>
            <td>
                <div style="text-align: right">
                    <a href="#.php" id="addRowsQ3Link"><img src="images/addrow.png" border="0" align="absmiddle"/></a>
                    |
                    <a href="#.php" id="removeRowsQ3Link"><img src="images/removerow.png" border="0" align="absmiddle"/></a>
                </div>
                <table border="0" width="100%">
                    <tr style="background: #eee">
                        <td>Col1</td>
                        <td>Col2</td>
                        <td>Col3</td>
                        <td>Col4</td>
                    </tr>
                    <tr id="thRowQ31" class="thInputRowQ3">
                        <td><input type="text" name="txtrowq311" id="txtrowq311" /></td>
                        <td><input type="text" name="txtrowq312" id="txtrowq312" /></td>
                        <td><input type="text" name="txtrowq313" id="txtrowq313" /></td>
                        <td><input type="text" name="txtrowq314" id="txtrowq314" /></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>Q4:</td>
            <td>
                <div style="text-align: right">
                    <a href="#.php" id="addRowsQ4Link"><img src="images/addrow.png" border="0" align="absmiddle"/></a>
                    |
                    <a href="#.php" id="removeRowsQ4Link"><img src="images/removerow.png" border="0" align="absmiddle"/></a>
                </div>
                <table border="0" width="100%">
                    <tr style="background: #eee">
                        <td>Col1</td>
                        <td>Col2</td>
                        <td>Col3</td>
                        <td>Col4</td>
                    </tr>
                    <tr id="thRowQ41" class="thInputRowQ4">
                        <td><input type="text" name="txtrowq411" id="txtrowq411" /></td>
                        <td><input type="text" name="txtrowq412" id="txtrowq412" /></td>
                        <td><input type="text" name="txtrowq413" id="txtrowq413" /></td>
                        <td><input type="text" name="txtrowq414" id="txtrowq414" /></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform1"/>
            </td>
        </tr>
    </table>
</form>
<?php
}else{
  ?>
  <div class="notify notify-yellow"><span class="symbol icon-info"></span> Record already exists in database.</div>
  <?php
}
?>
<div id="form1ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        //showListOfForm1Records();

        $('txttitle').focus();

        $( "#datepicker" ).datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,//this option for allowing user to select month
            changeYear: true //this option for allowing user to select from year range
        });

        $('#addRowsQ3Link').click(function(){
            var numRows = ($('.thInputRowQ3').length);
            var textBoxCol1Id = "txtrowq3"+(numRows+1)+1;
            var textBoxCol2Id = "txtrowq3"+(numRows+1)+2;
            var textBoxCol3Id = "txtrowq3"+(numRows+1)+3;
            var textBoxCol4Id = "txtrowq3"+(numRows+1)+4;
            var newRow = $("<tr id='thRowQ3"+((numRows)+1)+"' class='thInputRowQ3'><td><input type='text' name='"+textBoxCol1Id+"' id='"+textBoxCol1Id+"'/></td><td><input type='text' name='"+textBoxCol2Id+"' id='"+textBoxCol2Id+"'/></td><td><input type='text' name='"+textBoxCol3Id+"' id='"+textBoxCol3Id+"'/></td><td><input type='text' name='"+textBoxCol4Id+"' id='"+textBoxCol4Id+"'/></td></tr>");
            $('#thRowQ3'+(numRows)).after(newRow);
        });

        $('#removeRowsQ3Link').click(function(){
            var numRows = $('.thInputRowQ3').length;
            if(numRows > 1){
                var thRowId = 'thRowQ3'+(numRows);
                $('#'+thRowId).remove();
            }
        });

        $('#addRowsQ4Link').click(function(){
            var numRows = ($('.thInputRowQ4').length);
            var textBoxCol1Id = "txtrowq4"+(numRows+1)+1;
            var textBoxCol2Id = "txtrowq4"+(numRows+1)+2;
            var textBoxCol3Id = "txtrowq4"+(numRows+1)+3;
            var textBoxCol4Id = "txtrowq4"+(numRows+1)+4;
            var newRow = $("<tr id='thRowQ4"+((numRows)+1)+"' class='thInputRowQ4'><td><input type='text' name='"+textBoxCol1Id+"' id='"+textBoxCol1Id+"'/></td><td><input type='text' name='"+textBoxCol2Id+"' id='"+textBoxCol2Id+"'/></td><td><input type='text' name='"+textBoxCol3Id+"' id='"+textBoxCol3Id+"'/></td><td><input type='text' name='"+textBoxCol4Id+"' id='"+textBoxCol4Id+"'/></td></tr>");
            $('#thRowQ4'+(numRows)).after(newRow);
        });


        $('#removeRowsQ4Link').click(function(){
            var numRows = $('.thInputRowQ4').length;
            if(numRows > 1){
                var thRowId = 'thRowQ4'+(numRows);
                $('#'+thRowId).remove();
            }
        });

        $('#btnsaveform1').click(function(){
            var title = $('#txttitle').val();
            var formDate = $('#datepicker').val();
            var plan = $('#textareaplan').val();
            var q1 = $('#textareaq1').val();
            var q2 = $('#textareaq2').val();
            var q3NumRows = $('.thInputRowQ3').length;
            var q4NumRows = $('.thInputRowQ4').length;
            var dataString = "";

            if(formDate !== ""){
                dataString += "title="+encodeURIComponent(title)+"&formDate="+
                        formDate+"&plan="+encodeURIComponent(plan)+
                        "&q1="+encodeURIComponent(q1)+"&q2="+encodeURIComponent(q2)+
                        "&q3NumRows="+q3NumRows+"&q4NumRows="+q4NumRows;

                for(var i=1; i <= q3NumRows; i++){
                    var textBoxCol1Id = "txtrowq3"+i+1;
                    var textBoxCol2Id = "txtrowq3"+i+2;
                    var textBoxCol3Id = "txtrowq3"+i+3;
                    var textBoxCol4Id = "txtrowq3"+i+4;
                    //now get the value...
                    var textBoxCol1Val = $('#'+textBoxCol1Id).val();
                    var textBoxCol2Val = $('#'+textBoxCol2Id).val();
                    var textBoxCol3Val = $('#'+textBoxCol3Id).val();
                    var textBoxCol4Val = $('#'+textBoxCol4Id).val();

                    dataString += "&"+textBoxCol1Id+"="+encodeURIComponent(textBoxCol1Val)+
                            "&"+textBoxCol2Id+"="+encodeURIComponent(textBoxCol2Val)+
                            "&"+textBoxCol3Id+"="+encodeURIComponent(textBoxCol3Val)+
                            "&"+textBoxCol4Id+"="+encodeURIComponent(textBoxCol4Val);
                }//end for loop


                for(var i=1; i <= q4NumRows; i++){
                    var textBoxCol1Id = "txtrowq4"+i+1;
                    var textBoxCol2Id = "txtrowq4"+i+2;
                    var textBoxCol3Id = "txtrowq4"+i+3;
                    var textBoxCol4Id = "txtrowq4"+i+4;
                    //now get the value...
                    var textBoxCol1Val = $('#'+textBoxCol1Id).val();
                    var textBoxCol2Val = $('#'+textBoxCol2Id).val();
                    var textBoxCol3Val = $('#'+textBoxCol3Id).val();
                    var textBoxCol4Val = $('#'+textBoxCol4Id).val();

                    dataString += "&"+textBoxCol1Id+"="+encodeURIComponent(textBoxCol1Val)+
                            "&"+textBoxCol2Id+"="+encodeURIComponent(textBoxCol2Val)+
                            "&"+textBoxCol3Id+"="+encodeURIComponent(textBoxCol3Val)+
                            "&"+textBoxCol4Id+"="+encodeURIComponent(textBoxCol4Val);
                }//end for loop

                //alert(dataString);
                //now its time to save the data to the database...
                $.ajax({
                    url: 'files/saveform1.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        //alert('Saved Successfully');
                        $('#form1Div').html('<div class="notify notify-green"><span class="symbol icon-tick"></span> Saved Successfully</div>');
                        //clearFormInputFields(q3NumItems, q4NumItems);
                        showListOfForm1Records();
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }

        });//end button.click function

        function clearFormInputFields(q3NumItems, q4NumItems){
            $('#form1Entry')[0].reset();
            $('.added').remove();
        }

        function showListOfForm1Records(){
            $('#form1ManagementDetailDiv').load('files/showlistofform1records.php');
        }

    });//end document.ready function
</script>
