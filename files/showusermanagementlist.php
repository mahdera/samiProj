<div>
<?php
    @session_start();
    require_once 'user.php';
    require_once 'district.php';
    require_once 'subdistrict.php';
    require_once 'userdistrict.php';
    require_once 'usersubdistrict.php';
    require_once 'userrolelookup.php';
    require_once 'userlevellookup.php';
    require_once 'usersubdistrict.php';

    $theUserId = $_SESSION['INDIVIDUAL_INT_USER_ID'];
    $loggedInUserObj = getUser($theUserId);
    $userList = null;
    if($loggedInUserObj->member_type == 'Admin'){
        $userList = getAllNonAdminUsers();
    }else if($loggedInUserObj->member_type == 'User' && $loggedInUserObj->user_role == '02A'){
        //now get the branch id of the logged in user
        $userSubDistrictObj = getSubDistrictInfoForUser($theUserId);
        //echo 'sub district id : ' . $userSubDistrictObj->sub_district_id;
        $userList = getAllSubDistrictUsersWithSubDistrictId($userSubDistrictObj->sub_district_id);
    }else if($loggedInUserObj->member_type == 'User' && $loggedInUserObj->user_role == '01A'){
        //now get the zone id of the logged in user and get all zone and branch level users found under the zone id of this logged in user
        $userDistrictObj = getDistrictInfoForUser($theUserId);
        $userList = getAllDistrictAndSubDistrictUsersWithDistrictId($userDistrictObj->district_id);
    }
?>
<style>
  /*.fixed{
    top:0;
    position:fixed;
    width:auto;
    display:none;
    border:none;
    background-color:white;
  }*/
</style>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css"/>
<div style="background:#eee">
    <?php
      if($loggedInUserObj->member_type == 'Admin'){
        ?>
          <a href="#.php" id="createUserLink">Create User</a> |
          <a href="#.php" id="zoneManagementLink">District Management</a> |
          <a href="#.php" id="branchManagementLink">Sub District Management</a>
        <?php
      }else if($loggedInUserObj->member_type == 'User' && $loggedInUserObj->user_level == '01'){
        ?>
          <a href="#.php" id="createUserLink">Create User</a> |
          <a href="#.php" id="branchManagementLink">Sub District Management</a> |
          [<a href="#.php" id="editDistrictForDistrictAdminLink">Edit Your District</a>]
        <?php
      }else if($loggedInUserObj->member_type == 'User' && $loggedInUserObj->user_level == '02'){
        ?>
          <a href="#.php" id="createUserLink">Create User</a>
        <?php
      }
    ?>
</div>
<div>
    <form>
    <table id="example" border="1" rules="rows" class="display" cellspacing="0" width="100%" style="display: block;">
      <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>User Id</th>
            <th style="display:none">Member Type</th>
            <th>Status</th>
            <th style="display:none">User Level</th>
            <th>User Role</th>
            <th>District</th>
            <th>Sub District</th>
            <th style="display:none">Modification Date</th>
            <th>Reset Password</th>
            <th>Modify Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $ctr=1;
            $districtObj = null;
            $subDistrictObj = null;

            while($userRow = mysql_fetch_object($userList)){
                $districtObj = null;
                $subDistrictObj = null;
                if($userRow->user_level == '01'){
                    //fetch zone information from tbl_user_zone
                    $userDistrict = getDistrictInfoForUser($userRow->id);
                    if($userDistrict != null)
                      $districtObj = getDistrict($userDistrict->district_id);
                }else if($userRow->user_level == '02'){
                    //fetch branch information from tbl_user_branch
                    $userSubDistrict = getSubDistrictInfoForUser($userRow->id);
                    if($userSubDistrict != null){
                      $subDistrictObj = getSubDistrict($userSubDistrict->sub_district_id);
                      $districtObj = getDistrict($subDistrictObj->district_id);
                    }
                }
                //now do the conversion in here
                $userRole = getUserRoleLookUpUsingCode($userRow->user_role);
                $userLevel = getUserLevelLookUpUsingCode($userRow->user_level);
                ?>
                <tr>
                    <td><?php echo $userRow->first_name . " " . $userRow->last_name;?></td>
                    <td><?php echo $userRow->email;?></td>
                    <td><?php echo $userRow->user_id;?></td>
                    <td style="display:none"><?php echo $userRow->member_type;?></td>
                    <td><?php echo $userRow->user_status;?></td>
                    <td style="display:none"><?php echo ($userLevel != null ? $userLevel->value : '---');?></td>
                    <td><?php echo ($userRole != null ? $userRole->value : '---');?></td>
                    <td><?php echo ($districtObj != null ? $districtObj->display_name : '---');?></td>
                    <td><?php echo ($subDistrictObj != null ? $subDistrictObj->display_name : '---');?></td>
                    <td style="display:none"><?php echo $userRow->modification_date;?></td>
                    <td align="center">
                        <a href="#.php" class="resetUserPasswordLink" id="<?php echo $userRow->id;?>"><img src="images/reset.gif" border="0" align="absmiddle"/></a>
                    </td>
                    <td align="center">
                        <a href="#.php" class="modifyUserProfileLink" id="<?php echo $userRow->id;?>"><img src="images/edit.png" border="0" align="absmiddle"/></a>
                        |
                        [<a href="#.php" class="softDeleteLink" id="<?php echo $userRow->id;?>"><img src="images/delete.png" border="0" align="absmiddle"/></a>]
                    </td>
                </tr>
                <?php
            }//end while loop
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>Full Name</th>
          <th>Email</th>
          <th>User Id</th>
          <th style="display:none">Member Type</th>
          <th>Status</th>
          <th style="display:none">User Level</th>
          <th>User Role</th>
          <th>District</th>
          <th>Sub District</th>
          <th style="display:none">Modification Date</th>
          <th>Reset Password</th>
          <th>Modify Status</th>
        </tr>
      </tfoot>
    </table>
</form>
</div>
<hr/>
<div id="createUserDiv"></div>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#createUserLink').click(function(){
            $('#createUserDiv').load('files/showcreateuserform.php');
        });

        $('.resetUserPasswordLink').click(function(){
            var id = $(this).attr('id');
            $('#createUserDiv').load('files/showresetuserpasswordform.php?id='+id);
        });

        $('.modifyUserProfileLink').click(function(){
            var id = $(this).attr('id');
            $('#createUserDiv').load('files/showmodifyuserprofileform.php?id='+id);
        });

        $('.softDeleteLink').click(function(){
            if(window.confirm('Are you sure you want to delete this user?')){
                var id = $(this).attr('id');
                $('.content').load('files/softdeletedthisuser.php?id='+id);
            }
        });

        $('#editDistrictForDistrictAdminLink').click(function(){
            $('#createUserDiv').load('files/editdistrictfordistrictadminform.php');
        });

        $('#zoneManagementLink').click(function(){
            $('#createUserDiv').load('files/showzonemanagementmenu.php');
        });

        $('#branchManagementLink').click(function(){
            $('#createUserDiv').load('files/showbranchmanagementmenu.php');
        });

    });//end document.ready function

    /*;(function($) {
      $.fn.fixMe = function() {
        return this.each(function() {
          var $this = $(this),
          $t_fixed;
          function init() {
            $this.wrap('<div class="container" />');
            $t_fixed = $this.clone();
            $t_fixed.find("tbody").remove().end().addClass("fixed").insertBefore($this);
            resizeFixed();
          }
          function resizeFixed() {
            $t_fixed.find("th").each(function(index) {
              $(this).css("width",$this.find("th").eq(index).outerWidth()+"px");
            });
          }
          function scrollFixed() {
            var offset = $(this).scrollTop(),
            tableOffsetTop = $this.offset().top,
            tableOffsetBottom = tableOffsetTop + $this.height() - $this.find("thead").height();
            if(offset < tableOffsetTop || offset > tableOffsetBottom)
              $t_fixed.hide();
              else if(offset >= tableOffsetTop && offset <= tableOffsetBottom && $t_fixed.is(":hidden"))
                $t_fixed.show();
              }
              $(window).resize(resizeFixed);
              $(window).scroll(scrollFixed);
              init();
            });
          };
        })(jQuery);

        $(document).ready(function(){
          $("table").fixMe();
        });*/

        $(document).ready(function() {

            $('#example').DataTable({

            });


        });//end document.ready function

</script>
</div>
