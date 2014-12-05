<?php
    session_start();
    require_once 'user.php';
    require_once 'userdistrict.php';
    require_once 'district.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    $districtId = null;

    if(!empty($userObj)){
        if($userObj->user_level == '01'){
            //making sure the logged in user is a District Admin user...
            $districtId = getDistrictIdForUser($userObj->id);
            $districtObj = getDistrict($districtId);
            ?>
              <div>
                <h2>District Name Edit</h2>
                <form>
                  <table border="0" width="100%">
                    <tr>
                      <td>District Name:</td>
                      <td>
                        <input type="text" name="txtdistrictname" id="txtdistrictname" size="70" value="<?php echo $districtObj->display_name;?>"/>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" align="right">
                        <input type="button" value="Update" id="btnupdate"/>
                      </td>
                    </tr>
                  </table>
                </form>
              </div>
            <?php
        }
    }
?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#btnupdate').click(function(){
      var districtName = $('#txtdistrictname').val();
      if(districtName != ""){
        var districtId = "<?php echo $districtId;?>";
        var dataString = "districtId="+districtId+"&districtName="+districtName;
        $.ajax({
          url: 'files/updatedistrictnamebydistrictadmin.php',
          data: dataString,
          type:'POST',
          success:function(response){
            $('#createUserDiv').html(response);
          },
          error:function(error){
            alert(error);
          }
        });
      }else{
        alert('Please enter the district name!');
        $('#txtdistrictname').focus();
      }
    });
  });//end document.ready function
</script>
