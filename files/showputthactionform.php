<?php
    $thId = $_GET['thId'];
    
    require_once 'th.php';
    require_once 'goalfirst.php';
    require_once 'goalfirstg1.php';
    require_once 'goalfirstg1objfn.php';
    
    //now get all goalfirst records associated with this particular thId
    $goalFirstList = getGoalFirstUsingThId($thId);
    if(!empty($goalFirstList)){
        //now get all goalfirstg1 records associated with this particualr goalfirstid
        ?>
        <table border="0" width="100%">           
        <?php        
        while($goalFirstRow = mysql_fetch_object($goalFirstList)){
            
            $goalFirstG1List = getGoalFirstG1ForGoalFirst($goalFirstRow->id);
            
            if(!empty($goalFirstG1List)){
                while($goalFirstG1Row = mysql_fetch_object($goalFirstG1List)){
                    ?>
                    <tr>
                        <td><?php echo $goalFirstG1Row->g1;?></td>
                        <td><?php echo $goalFirstG1Row->fn;?></td>
                    </tr>
                    <?php
                }//end while loop goalFirstG1Row
            }//end empty checking for goalFirstG1List
        }//end while loop goalFirstRow
        ?>
        </table>    
        <?php    
    }//end if condition
?>
