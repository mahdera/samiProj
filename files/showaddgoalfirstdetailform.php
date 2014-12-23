<?php
  require_once 'th.php';
  require_once 'fn.php';
  require_once 'user.php';
  require_once 'usersubdistrict.php';
  require_once 'goalfirstth.php';

  $thId = $_GET['thId'];
?>
<form id="goalFirstManagementForm">
  <fieldset>
    <legend>Add Goal First Form</legend>
    <table border="0" width="100%">
      <tr style="background: red">
        <td width="20%">G1:</td>
        <td>
          <!--<input type="text" name="txtg1" id="txtg1" size="70"/>-->
          <textarea name="txtg1" id="txtg1" style="width:100%" rows="4"></textarea>
        </td>
      </tr>
      <tr style="background: red">
        <td width="20%">Fn:</td>
        <td>
          <select name="slctg1fn" id="slctg1fn" style="width: 95%" class="fnDropDown">
            <option value="" selected="selected">--Select--</option>
            <?php
            //$fnList = getAllFnsModifiedByThisUser($_SESSION['LOGGED_USER_ID']);
            if($userObj->user_level == '02'){
              $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
              $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
            }else if($userObj->user_level == '01'){
              $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
              $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
              $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
            }
            while($fnRow = mysql_fetch_object($fnList)){
              //foreach ($fnIdArray as $fnId) {
              //$fnObj = getFn($fnId);
              ?>
              <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
              <?php
            }//end for loop
            ?>
            <option value="other">other</option>
          </select>
          <a href="#.php" class="fnRefreshSpin" title="Refresh Fn list" id="g1fn"><img src="images/spin.png" border="0" align="absmiddle"/></a>
        </td>
      </tr>
      <tr style="background: red">
        <td colspan="2">
          <div id="g1fnOtherDiv"></div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <table border="0" width="100%" style="background: #fff">
            <tr style="background: red">
              <td width="20%">Obj:</td>
              <td>
                <!--<input type="text" id="txtg1obj1" name="txtg1obj1" class="g1Obj" size="70"/>-->
                <textarea name="txtg1obj1" id="txtg1obj1" class="g1Obj" style="width:100%" rows="4"></textarea>
              </td>
            </tr>
            <tr>
              <td width="20%">Fn:</td>
              <td>
                <select name="slctg1fn1" id="slctg1fn1" style="width: 95%" class="fnDropDown">
                  <option value="" selected="selected">--Select--</option>
                  <?php
                  if($userObj->user_level == '02'){
                    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                    $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                  }else if($userObj->user_level == '01'){
                    $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                    $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                  }
                  while($fnRow = mysql_fetch_object($fnList)){
                    ?>
                    <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                    <?php
                  }//end for loop
                  ?>
                  <option value="other">other</option>
                </select>
                <a href="#.php" class="fnRefreshSpin" title="Refresh Fn list" id="g1fn1"><img src="images/spin.png" border="0" align="absmiddle"/></a>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr style="background: red">
        <td colspan="2">
          <div id="g1fnObjOtherDiv"></div>
        </td>
      </tr>
      <tr id="addMoreG1ObjFn1">
        <td colspan="2" align="right">
          <a href="#.php" id="addMoreG1ObjFnLink">[Add More]</a> |
          <a href="#.php" id="removeG1ThRowLink">[Remove]</a>
        </td>
      </tr>
      <!--do the same thing for G2-->
      <tr>
        <td width="20%">G2:</td>
        <td>
          <!--<input type="text" name="txtg2" id="txtg2" size="70"/>-->
          <textarea name="txtg2" id="txtg2" style="width:100%" rows="4"></textarea>
        </td>
      </tr>
      <tr>
        <td width="20%">Fn:</td>
        <td>
          <select name="slctg2fn" id="slctg2fn" style="width: 95%" class="fnDropDown">
            <option value="" selected="selected">--Select--</option>
            <?php
            if($userObj->user_level == '02'){
              $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
              $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
            }else if($userObj->user_level == '01'){
              $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
              $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
              $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
            }
            while($fnRow = mysql_fetch_object($fnList)){
              ?>
              <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
              <?php
            }//end for loop
            ?>
            <option value="other">other</option>
          </select>
          <a href="#.php" class="fnRefreshSpin" title="Refresh Fn list" id="g2fn"><img src="images/spin.png" border="0" align="absmiddle"/></a>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div id="g2fnOtherDiv"></div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <table border="0" width="100%" style="background: #fff">
            <tr>
              <td width="20%">Obj:</td>
              <td>
                <!--<input type="text" id="txtg2obj1" name="txtg2obj1" class="g2Obj" size="70"/>-->
                <textarea name="txtg2obj1" id="txtg2obj1" class="g2Obj" style="width:100%" rows="4"></textarea>
              </td>
            </tr>
            <tr>
              <td width="20%">Fn:</td>
              <td>
                <select name="slctg2fn1" id="slctg2fn1" style="width: 95%" class="fnDropDown">
                  <option value="" selected="selected">--Select--</option>
                  <?php
                  if($userObj->user_level == '02'){
                    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                    $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                  }else if($userObj->user_level == '01'){
                    $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                    $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                  }
                  while($fnRow = mysql_fetch_object($fnList)){
                    ?>
                    <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                    <?php
                  }//end for loop
                  ?>
                  <option value="other">other</option>
                </select>
                <a href="#.php" class="fnRefreshSpin" title="Refresh Fn list" id="g2fn1"><img src="images/spin.png" border="0" align="absmiddle"/></a>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div id="g2fnObjOtherDiv"></div>
        </td>
      </tr>
      <tr id="addMoreG2ObjFn1">
        <td colspan="2" align="right">
          <a href="#.php" id="addMoreG2ObjFnLink">[Add More]</a> |
          <a href="#.php" id="removeG2ThRowLink">[Remove]</a>
        </td>
      </tr>
      <!--now do the same thing for G3-->
      <tr>
        <td width="20%">G3:</td>
        <td>
          <textarea name="txtg3" id="txtg3" style="width:100%" rows="4"></textarea>
        </td>
      </tr>
      <tr>
        <td width="20%">Fn:</td>
        <td>
          <select name="slctg3fn" id="slctg3fn" style="width: 95%" class="fnDropDown">
            <option value="" selected="selected">--Select--</option>
            <?php
            if($userObj->user_level == '02'){
              $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
              $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
            }else if($userObj->user_level == '01'){
              $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
              $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
              $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
            }
            while($fnRow = mysql_fetch_object($fnList)){
              ?>
              <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
              <?php
            }//end for loop
            ?>
            <option value="other">other</option>
          </select>
          <a href="#.php" class="fnRefreshSpin" title="Refresh Fn list" id="g3fn"><img src="images/spin.png" border="0" align="absmiddle"/></a>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div id="g3fnOtherDiv"></div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <table border="0" width="100%" style="background: #fff">
            <tr>
              <td width="20%">Obj:</td>
              <td>
                <textarea name="txtg3obj1" id="txtg3obj1" style="width:100%" rows="4" class="g3Obj"></textarea>
              </td>
            </tr>
            <tr>
              <td width="20%">Fn:</td>
              <td>
                <select name="slctg3fn1" id="slctg3fn1" style="width: 95%" class="fnDropDown">
                  <option value="" selected="selected">--Select--</option>
                  <?php
                  if($userObj->user_level == '02'){
                    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                    $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                  }else if($userObj->user_level == '01'){
                    $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                    $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                  }
                  while($fnRow = mysql_fetch_object($fnList)){
                    ?>
                    <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                    <?php
                  }//end for loop
                  ?>
                  <option value="other">other</option>
                </select>
                <a href="#.php" class="fnRefreshSpin" title="Refresh Fn list" id="g3fn1"><img src="images/spin.png" border="0" align="absmiddle"/></a>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div id="g3fnObjOtherDiv"></div>
        </td>
      </tr>
      <tr id="addMoreG3ObjFn1">
        <td colspan="2" align="right">
          <a href="#.php" id="addMoreG3ObjFnLink">[Add More]</a> |
          <a href="#.php" id="removeG3ThRowLink">[Remove]</a>
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
