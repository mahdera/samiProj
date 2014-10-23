<?php
    session_start();
?>
<h1>Goal First List</h1>
<?php
    require_once 'th.php';
    require_once 'thaction.php';
    require_once 'goalfirst.php';
    $goalFirstList = getAllGoalFirstsModifiedBy($_SESSION['LOGGED_USER_ID']);
    //this will have to be like all goalFirsts then filter out the ths in the goal first list

    if(!empty($goalFirstList)){
        ?>
        <table border="0" width="100%">
            <tr style="background: #CCC">
                <td width="10%">Ser.No</td>
                <td width="20%">Th</td>
                <td>Action</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            <?php
                $ctr=1;
                    while($goalFirstRow = mysql_fetch_object($goalFirstList)){
                        $thObj = getTh($goalFirstRow->th_id);
                        $countVal = 0;
                        $divId = "actionDiv" . $thObj->id;
                        $countVal = doesThisThAlreadyActionFilledForIt($thObj->id);
                        if(!$countVal){
                            ?>
                            <tr>
                                <td><?php echo $ctr;?></td>
                                <td><?php echo $thObj->th_name;?></td>
                                <td>
                                    [<a href="#.php" id="<?php echo $thObj->id;?>" class="openActionFormClass">Show Goal First Detail</a> | <a href="#.php" id="<?php echo $thObj->id;?>" class="closeActionFormClass">Close Goal First Detail</a>]
                                </td>
                                <td>
                                    <a href="#.php" id="<?php echo $thObj->id;?>" class="openGoalFirstDetailForEditClass">Edit</a>
                                </td>
                                <td>
                                    <a href="#.php" id="<?php echo $thObj->id;?>" class="deleteGoalFirstDetailClass">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <div id="<?php echo $divId;?>"></div>
                                </td>
                            </tr>
                            <?php
                            $ctr++;
                        }//end inner...if condition
                    }//end while loop construct
                    if($countVal){
                        //echo '<div class="notify"><span class="symbol icon-info"></span> All Ths Have Action Record !</div>';
                    }
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
            $('#' + divId).load('files/showgoalfirstdetailhere.php?thId='+idVal);
        });

        $('.closeActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).html('');
        });

        $('.openGoalFirstDetailForEditClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;            
            $('#' + divId).load('files/showgoalfirstdetailhereforedit.php?thId='+idVal);
        });

        //come back later for the delete feature...

    });//end document.ready function
</script>
