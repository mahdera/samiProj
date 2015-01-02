<h1>Add Th</h1>
<a href="#.php" id="showThManagementFormLinkId">Show</a>
|
<a href="#.php" id="hideThManagementFormLinkId">Hide</a>
<form id="thManagementForm">
    <fieldset>
      <legend>Add Th Form</legend>
    <table border="0" width="100%">
        <tr>
            <td>Th:</td>
            <td>
                <input type="text" name="txtth" id="txtth" size="70"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsave"/>
            </td>
        </tr>
    </table>
  </fieldset>
</form>
<hr/>
<div id="subDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        $('#thManagementForm').show();

        $('html, body').animate({
          'scrollTop' : $("#thManagementForm").position().top
        });

        $('#showThManagementFormLinkId').click(function(){
            $('#thManagementForm').show('slow');
        });

        $('#hideThManagementFormLinkId').click(function(){
            $('#thManagementForm').hide('slow');
        });

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
                        $('#thManagementForm').hide('slow');
                    },
                    error:function(error){
                        alert(error);
                    }
                });

            }
        });

        function clearFormInputField(){
            $('#txtth').val('');
        }

        function showListOfThs(){
            $('#subDetailDiv').load('files/showlistofths.php', {noncache: new Date().getTime()});
        }

    });//end document.ready function
</script>
