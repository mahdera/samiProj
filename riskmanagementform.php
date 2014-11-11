<?php    
    require_once 'files/th.php';
    $thList = getAllThsModifiedBy($_SESSION['LOGGED_USER_ID']);
?>
<h1>Add Risk</h1>
<a href="#.php" id="showRiskManagementFormLinkId">Show Form</a>
|
<a href="#.php" id="hideRiskManagementFormLinkId">Hide Form</a>
<form id="riskManagementForm">
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
            <td>MG</td>
            <td>
                <select name="slctmg" id="slctmg" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <option value="mg1">mg1</option>
                    <option value="mg2">mg2</option>
                    <option value="mg3">mg3</option>
                    <option value="mg4">mg4</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>DR</td>
            <td>
                <select name="slctdr" id="slctdr" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <option value="dr1">dr1</option>
                    <option value="dr2">dr2</option>
                    <option value="dr3">dr3</option>
                    <option value="dr4">dr4</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>PR</td>
            <td>
                <select name="slctpr" id="slctpr" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <option value="pr1">pr1</option>
                    <option value="pr2">pr2</option>
                    <option value="pr3">pr3</option>
                    <option value="pr4">pr4</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>WA</td>
            <td>
                <select name="slctwa" id="slctwa" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <option value="wa1">wa1</option>
                    <option value="wa2">wa2</option>
                    <option value="wa3">wa3</option>
                    <option value="wa4">wa4</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>RS</td>
            <td>
                <select name="slctrs" id="slctrs" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <option value="rs1">rs1</option>
                    <option value="rs2">rs2</option>
                    <option value="rs3">rs3</option>
                    <option value="rs4">rs4</option>
                </select>
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

        $('#riskManagementForm').hide();

        $('#showRiskManagementFormLinkId').click(function(){
            $('#riskManagementForm').show('slow');
        });

        $('#hideRiskManagementFormLinkId').click(function(){
            $('#riskManagementForm').hide('slow');
        });

        showListOfRisks();

        $('#btnsave').click(function(){
            var thId = $('#slctth').val();
            var mg = $('#slctmg').val();
            var dr = $('#slctdr').val();
            var pr = $('#slctpr').val();
            var wa = $('#slctwa').val();
            var rs = $('#slctrs').val();

            if(thId !== "" && mg !== "" && dr !== "" && pr !== "" && wa !== "" && rs !== ""){
                var dataString = "thId="+thId+"&mg="+mg+"&dr="+dr+"&pr="+pr+"&wa="+wa+"&rs="+rs;

                $.ajax({
                    url: 'files/saverisk.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        clearFormInputFields();
                        showListOfRisks();
                    },
                    error:function(error){
                        alert(error);
                    }
                });

            }else{
                alert('Please enter all the values!');
            }

        });

        function showListOfRisks(){
            $('#subDetailDiv').load('files/showlistofrisks.php');
        }

        function clearFormInputFields(){
            $('#slctth').val('');
            $('#slctmg').val('');
            $('#slctdr').val('');
            $('#slctpr').val('');
            $('#slctwa').val('');
            $('#slctrs').val('');
        }

    });//end document.ready function
</script>
