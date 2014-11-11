<?php
  error_reporting( 0 );
  $fnIdArray = array();
?>
<form id="goalFirstManagementForm">
    <table border="0" width="100%">
        <tr>
            <td>Th:</td>
            <td>
                <select name="slctth" id="slctth" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        //loop the array instead...
                        for($i=0; $i < count($selectedThIdArray); $i++){
                            $thObj = getTh($selectedThIdArray[$i]);
                            ?>
                                <option value="<?php echo $thObj->id;?>"><?php echo $thObj->th_name;?></option>
                            <?php
                        }//end for loop
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
                        //first read fns from tbl_goal_first_g1
                        $fnIdArray = getAllFilteredLatestFnIdsEnteredByUser($_SESSION['LOGGED_USER_ID']);
                        foreach ($fnIdArray as $fnId) {
                            $fnObj = getFn($fnId);
                            ?>
                                <option value="<?php echo $fnId;?>"><?php echo $fnObj->fn_name;?></option>
                            <?php
                        }//end foreach loop...

                        /*while($fnRow = mysql_fetch_object($fnList)){
                            ?>
                                <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                            <?php
                        }//end while loop*/
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
                                    //first read fns from tbl_goal_first_g1
                                    $fnIdArray = getAllFilteredLatestFnIdsEnteredByUser($_SESSION['LOGGED_USER_ID']);
                                    foreach ($fnIdArray as $fnId) {
                                        $fnObj = getFn($fnId);
                                        ?>
                                            <option value="<?php echo $fnId;?>"><?php echo $fnObj->fn_name;?></option>
                                        <?php
                                    }//end foreach loop...
                                    /*$fnList = getAllFns();
                                    while($fnRow = mysql_fetch_object($fnList)){
                                        ?>
                                            <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                                        <?php
                                    }//end while loop*/
                                ?>
                                <option value="other">other</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="g1fnObjOtherDiv"></div>
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
                        //first read fns from tbl_goal_first_g1
                        $fnIdArray = getAllFilteredLatestFnIdsEnteredByUser($_SESSION['LOGGED_USER_ID']);
                        foreach ($fnIdArray as $fnId) {
                            $fnObj = getFn($fnId);
                            ?>
                                <option value="<?php echo $fnId;?>"><?php echo $fnObj->fn_name;?></option>
                            <?php
                        }//end foreach loop...
                        /*$fnList = getAllFns();
                        while($fnRow = mysql_fetch_object($fnList)){
                            ?>
                                <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                            <?php
                        }//end while loop*/
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
                                    //first read fns from tbl_goal_first_g1
                                    $fnIdArray = getAllFilteredLatestFnIdsEnteredByUser($_SESSION['LOGGED_USER_ID']);
                                    foreach ($fnIdArray as $fnId) {
                                        $fnObj = getFn($fnId);
                                        ?>
                                            <option value="<?php echo $fnId;?>"><?php echo $fnObj->fn_name;?></option>
                                        <?php
                                    }//end foreach loop...
                                    /*$fnList = getAllFns();
                                    while($fnRow = mysql_fetch_object($fnList)){
                                        ?>
                                            <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                                        <?php
                                    }//end while loop*/
                                    ?>
                                    <option value="other">other</option>
                            </select>
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
                        /*$fnList = getAllFns();
                        while($fnRow = mysql_fetch_object($fnList)){
                            ?>
                                <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                            <?php
                        }//end while loop*/
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
                                    //first read fns from tbl_goal_first_g1
                                    $fnIdArray = getAllFilteredLatestFnIdsEnteredByUser($_SESSION['LOGGED_USER_ID']);
                                    foreach ($fnIdArray as $fnId) {
                                        $fnObj = getFn($fnId);
                                        ?>
                                            <option value="<?php echo $fnId;?>"><?php echo $fnObj->fn_name;?></option>
                                        <?php
                                    }//end foreach loop...
                                    /*$fnList = getAllFns();
                                    while($fnRow = mysql_fetch_object($fnList)){
                                        ?>
                                            <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                                        <?php
                                    }//end while loop*/
                                    ?>
                                    <option value="other">other</option>
                            </select>
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
        <tr id="addMoreG3ObjFn">
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
</form>
