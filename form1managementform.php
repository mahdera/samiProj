<?php
  error_reporting( 0 );
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
                    <a href="#.php" id="addRowsQ3Link">Add Row</a>
                    |
                    <a href="#.php" id="removeRowsQ3Link">Remove Row</a>
                </div>
                <table border="0" width="100%">
                    <tr style="background: #eee">
                        <td>Col1</td>
                        <td>Col2</td>
                        <td>Col3</td>
                        <td>Col4</td>
                    </tr>
                    <tr id="thRowQ31">
                        <td><input type="text" name="txtrowq31" id="txtrowq31" class="thInputRowQ3"/></td>
                        <td><input type="text" name="txtrowq32" id="txtrowq32" class="thInputRowQ3"/></td>
                        <td><input type="text" name="txtrowq33" id="txtrowq33" class="thInputRowQ3"/></td>
                        <td><input type="text" name="txtrowq34" id="txtrowq34" class="thInputRowQ3"/></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>Q4:</td>
            <td>
                <div style="text-align: right">
                    <a href="#.php" id="addRowsQ4Link">Add Row</a>
                    |
                    <a href="#.php" id="removeRowsQ4Link">Remove Row</a>
                </div>
                <table border="0" width="100%">
                    <tr style="background: #eee">
                        <td>Col1</td>
                        <td>Col2</td>
                        <td>Col3</td>
                        <td>Col4</td>
                    </tr>
                    <tr id="thRowQ41">
                        <td><input type="text" name="txtrowq41" id="txtrowq41" class="thInputRowQ4"/></td>
                        <td><input type="text" name="txtrowq42" id="txtrowq42" class="thInputRowQ4"/></td>
                        <td><input type="text" name="txtrowq43" id="txtrowq43" class="thInputRowQ4"/></td>
                        <td><input type="text" name="txtrowq44" id="txtrowq44" class="thInputRowQ4"/></td>
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
<div id="form1ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        showListOfForm1Records();

        $('txttitle').focus();

        $( "#datepicker" ).datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,//this option for allowing user to select month
            changeYear: true //this option for allowing user to select from year range
        });

        $('#addRowsQ3Link').click(function(){
            var numItems = ($('.thInputRowQ3').length);
            var textBoxCol1Id = "txtrowq3"+(numItems+1);
            var textBoxCol2Id = "txtrowq3"+(numItems+2);
            var textBoxCol3Id = "txtrowq3"+(numItems+3);
            var textBoxCol4Id = "txtrowq3"+(numItems+4);
            var newRow = $("<tr id='thRowQ3"+((numItems/4)+1)+"'><td><input type='text' class='thInputRowQ3' name='"+textBoxCol1Id+"' id='"+textBoxCol1Id+"'/></td><td><input type='text' class='thInputRowQ3' name='"+textBoxCol2Id+"' id='"+textBoxCol2Id+"'/></td><td><input type='text' class='thInputRowQ3' name='"+textBoxCol3Id+"' id='"+textBoxCol3Id+"'/></td><td><input type='text' class='thInputRowQ3' name='"+textBoxCol4Id+"' id='"+textBoxCol4Id+"'/></td></tr>");
            $('#thRowQ3'+(numItems/4)).after(newRow);
        });

        $('#removeRowsQ3Link').click(function(){
            var numItems = $('.thInputRowQ3').length;
            if((numItems/4) > 1){
                var thRowId = 'thRowQ3'+(numItems/4);
                $('#'+thRowId).remove();
            }
        });

        $('#addRowsQ4Link').click(function(){
            var numItems = ($('.thInputRowQ4').length);
            var textBoxCol1Id = "txtrowq4"+(numItems+1);
            var textBoxCol2Id = "txtrowq4"+(numItems+2);
            var textBoxCol3Id = "txtrowq4"+(numItems+3);
            var textBoxCol4Id = "txtrowq4"+(numItems+4);
            var newRow = $("<tr id='thRowQ4"+((numItems/4)+1)+"'><td><input type='text' class='thInputRowQ4' name='"+textBoxCol1Id+"' id='"+textBoxCol1Id+"'/></td><td><input type='text' class='thInputRowQ4' name='"+textBoxCol2Id+"' id='"+textBoxCol2Id+"'/></td><td><input type='text' class='thInputRowQ4' name='"+textBoxCol3Id+"' id='"+textBoxCol3Id+"'/></td><td><input type='text' class='thInputRowQ4' name='"+textBoxCol4Id+"' id='"+textBoxCol4Id+"'/></td></tr>");
            $('#thRowQ4'+(numItems/4)).after(newRow);
        });

        $('#removeRowsQ4Link').click(function(){
            var numItems = $('.thInputRowQ4').length;
            if((numItems/4) > 1){
                var thRowId = 'thRowQ4'+(numItems/4);
                $('#'+thRowId).remove();
            }
        });

        $('#btnsaveform1').click(function(){
            var title = $('#txttitle').val();
            var formDate = $('#datepicker').val();
            var plan = $('#textareaplan').val();
            var q1 = $('#textareaq1').val();
            var q2 = $('#textareaq2').val();
            var q3NumItems = $('.thInputRowQ3').length;
            var q4NumItems = $('.thInputRowQ4').length;
            var dataString = "";

            if(formDate !== ""){
                dataString += "title="+encodeURIComponent(title)+"&formDate="+
                        formDate+"&plan="+encodeURIComponent(plan)+
                        "&q1="+encodeURIComponent(q1)+"&q2="+encodeURIComponent(q2)+
                        "&q3NumItems="+q3NumItems+"&q4NumItems="+q4NumItems;
                for(var i=1; i <= q3NumItems; i++){
                    var textBoxId = "txtrowq3"+i;
                    //now get the value...
                    var textBoxIdVal = $('#'+textBoxId).val();
                    dataString += "&"+textBoxId+"="+encodeURIComponent(textBoxIdVal);
                }//end for loop

                for(var j=1; j <= q4NumItems; j++){
                    var textBoxId = "txtrowq4"+j;
                    //now get the values...
                    var textBoxIdVal = $('#'+textBoxId).val();
                    dataString += "&"+textBoxId+"="+encodeURIComponent(textBoxIdVal);
                }
                //alert(dataString);
                //now its time to save the data to the database...
                $.ajax({
                    url: 'files/saveform1.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        //alert('Form One Saved Successfully!');
                        $('#form1Div').html('<div class="notify notify-green"><span class="symbol icon-tick"></span> Form One Saved Successfully!</div>');
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
            /*
            $('#txttitle').val('');
            $('#datepicker').val('');
            $('#textareaplan').val('');
            $('#textareaq1').val('');
            $('#textareaq2').val('');

            for(var i=1; i <= q3NumItems; i++){
                var textBoxId = "txtrowq3"+i;
                $('#'+textBoxId).val('');
            }

            for(var j=1; j <= q4NumItems; j++){
                var textBoxId = "txtrowq4"+j;
                $('#'+textBoxId).val('');
            }*/
        }

        function showListOfForm1Records(){
            $('#form1ManagementDetailDiv').load('files/showlistofform1records.php');
        }

    });//end document.ready function
</script>
