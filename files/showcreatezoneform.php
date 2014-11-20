<div>
    <form>
        <table border="0" width="100%">
            <tr>
                <td>District Name:</td>
                <td>
                    <input type="text" name="txtzonename" id="txtzonename" size="70"/>
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                    <textarea name="textareadescription" id="textareadescription" rows="3" style="width:100%"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="button" value="Create" id="btnsave"/>
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#btnsave').click(function(){
      var zoneName = $('#txtzonename').val();
      var description = $('#textareadescription').val();

      if(zoneName != ""){
          var dataString = "zoneName="+zoneName+"&description="+description;
          $.ajax({
              url: 'files/createzone.php',
              data: dataString,
              type:'POST',
              success:function(response){
                  $('#zoneManagementDiv').html(response);
              },
              error:function(error){
                  alert(error);
              }
          });
      }
    });
  });//end document.ready function
</script>
