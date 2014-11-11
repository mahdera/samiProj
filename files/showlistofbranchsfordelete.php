<?php
    require_once 'zone.php';
    require_once 'branch.php';

    $branchList = getAllBranchs();
    if(mysql_num_rows($branchList)){
        ?>
            <table border="0" width="100%">
                <tr>
                    <td>Ser.No</td>
                    <td>Zone</td>
                    <td>Branch Name</td>
                    <td>Description</td>
                    <td>Delete</td>
                </tr>
                <?php
                  $ctr=1;
                  while($branchRow = mysql_fetch_object($branchList)){
                      $zoneObj = getZone($branchRow->zone_id);
                      ?>
                          <tr>
                              <td><?php echo $ctr++;?></td>
                              <td><?php echo $zoneObj->zone_name;?></td>
                              <td><?php echo $branchRow->branch_name;?></td>
                              <td><?php echo $branchRow->description;?></td>
                              <td>
                                  <a href="#.php" id="<?php echo $branchRow->id;?>" class="deleteBranchClass">Delete</a>
                              </td>
                          </tr>
                      <?php
                  }//end while loop
                ?>
            </table>
        <?php
    }
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.deleteBranchClass').click(function(){
            var idVal = $(this).attr('id');

            if(window.confirm('Are you sure you want to delete this record?')){
                var dataString = "branchId="+idVal;
                $.ajax({
                    url: 'files/deletebranch.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('#branchManagementDiv').load('files/showlistofbranchsfordelete.php');
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });
    });//end document.ready function
</script>
