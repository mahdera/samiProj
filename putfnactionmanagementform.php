<?php
  error_reporting( 0 );
?>
<h2>Fn Action</h2>
<?php
    //first grab all fn record from the database...
    require_once 'files/fn.php';
    require_once 'files/fnaction.php';
    require_once 'files/goalsecond.php';
    require_once 'files/goalsecondfn.php';

    $goalSecondFnList = getAllGoalSecondFnsModifiedBy($_SESSION['LOGGED_USER_ID']);
?>
<table border="0" width="100%">
    <tr style="background: #ccc">
        <td>Ser.No</td>
        <td>Fn</td>
        <td>Action</td>
        <td>View/Edit/Delete</td>
    </tr>
    <?php
        $ctr=1;
        while($goalSecondFnRow = mysql_fetch_object($goalSecondFnList)){
            $fnObj = getFn($goalSecondFnRow->fn_id);
            $countVal = 0;
            $divId = "actionDiv" . $fnObj->id;
            //$countVal = doesThisFnAlreadyActionFilledForIt($fnObj->id);
            if(true){
                ?>
                    <tr>
                        <td width="10%"><?php echo $ctr++;?></td>
                        <td width="20%"><?php echo $fnObj->fn_name;?></td>
                        <td>
                            <a href="#.php" id="<?php echo $fnObj->id;?>" class="openActionFormClass">Show Add Action Form</a> | <a href="#.php" id="<?php echo $fnObj->id;?>" class="closeActionFormClass">Close Add Action Form</a>
                        </td>
                        <td>
                          [<a href="#.php" id="<?php echo $fnObj->id;?>" class="viewFnActionLink">View</a> | <a href="#.php" id="<?php echo $fnObj->id;?>" class="editFnActionLink">Edit</a> | <a href="#.php" id="<?php echo $fnObj->id;?>" class="deleteFnActionLink">Delete</a>]
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div id="<?php echo $divId;?>"></div>
                        </td>
                    </tr>
                <?php
            }
        }//end while loop
    ?>
</table>
<script type="text/javascript">
    $(document).ready(function(){

        $('.openActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            //now create the div element using the id you got in here...
            var divId = "actionDiv" + idVal;

            $('#' + divId).load('files/showputfnactionform.php?fn_id='+idVal);
        });

        $('.closeActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).html('');
        });

        $('.viewFnActionLink').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).load('files/showlistoffnactiontextsforfn.php?fnId='+idVal);
        });

        $('.editFnActionLink').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).load('files/showlistoffnactiontextsforfnforedit.php?fnId='+idVal);
        });

        $('.deleteFnActionLink').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).load('files/showlistoffnactiontextsforfnfordelete.php?fnId='+idVal);
        });

    });//end document.ready function
</script>
