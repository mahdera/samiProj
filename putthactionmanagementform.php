<?php
  error_reporting( 0 );
?>
<h1>Th Action</h1>
<?php
    require_once 'files/th.php';
    require_once 'files/thaction.php';
    require_once 'files/goalfirst.php';
    require_once 'files/goalfirstth.php';

    $goalFirstThList = getAllGoalFirstThsModifiedBy($_SESSION['LOGGED_USER_ID']);
    //this will have to be like all goalFirsts then filter out the ths in the goal first list

    if($goalFirstThList){
        ?>
        <table border="0" width="100%">
            <tr style="background: #CCC">
                <td width="20%">Th</td>
                <td>Action</td>
                <td>View/Edit/Delete</td>
            </tr>
            <?php
                $ctr=1;
                    while($goalFirstThRow = mysql_fetch_object($goalFirstThList)){
                        $thObj = getTh($goalFirstThRow->th_id);
                        $countVal = 0;
                        $divId = "actionDiv" . $thObj->id;
                        //$countVal = doesThisThAlreadyActionFilledForIt($thObj->id);
                        if(true){
                            ?>
                            <tr>
                                <td><?php echo $thObj->th_name;?></td>
                                <td>
                                    [<a href="#.php" id="<?php echo $thObj->id;?>" class="openActionFormClass">Show Add Action Form</a> | <a href="#.php" id="<?php echo $thObj->id;?>" class="closeActionFormClass">Close Add Action Form</a>]
                                </td>
                                <td>
                                  [<a href="#.php" id="<?php echo $thObj->id;?>" class="viewThActionLink">View</a> | <a href="#.php" id="<?php echo $thObj->id;?>" class="editThActionLink">Edit</a> | <a href="#.php" id="<?php echo $thObj->id;?>" class="deleteThActionLink">Delete</a>]
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div id="<?php echo $divId;?>"></div>
                                </td>
                            </tr>
                            <?php
                            $ctr++;
                        }//end inner...if condition
                    }//end while loop construct
                ?>
        </table>
        <?php
    }
?>
<hr/>
<div id="subDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        $('.openActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            //now create the div element using the id you got in here...
            var divId = "actionDiv" + idVal;
            $('#' + divId).load('files/showputthactionform.php?thId='+idVal);
        });

        $('.closeActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).html('');
        });

        $('.viewThActionLink').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).load('files/showlistofthactiontextsforth.php?thId='+idVal);
        });

        $('.editThActionLink').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).load('files/showlistofthactiontextsforthforedit.php?thId='+idVal);
        });

        $('.deleteThActionLink').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).load('files/showlistofthactiontextsforthfordelete.php?thId='+idVal);
        });

    });//end document.ready function
</script>
