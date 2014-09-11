<?php
    require_once 'files/team.php';
?>
<h2>Add Responsibility</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Team:</td>
            <td>
                <select name="slctteam" id="slctteam" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        //now get list of teams from the database...
                        $teamList = getAllTeams();
                        if(!empty($teamList)){
                            while($teamRow = mysql_fetch_object($teamList)){
                                ?>
                                <option value="<?php echo $teamRow->id;?>"><?php echo $teamRow->team_name;?></option>
                                <?php
                            }//end while loop
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Role:</td>
            <td>
                <textarea name="textarearole" id="textarearole" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td>Responsibility:</td>
            <td>
                <textarea name="textarearesponsibility" id="textarearesponsibility" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsave"/>
                <input type="reset" value="Clear"/>
            </td>
        </tr>        
    </table>
</form>
<hr/>

<div id="subDetailDiv"></div>

<script type="text/javascript">
    $(document).ready(function(){
        showListOfResponsibilities();
        
        $('#btnsave').click(function(){
            var teamId = $('#slctteam').val();
            var role = $('#textarearole').val();
            var responsibility = $('#textarearesponsibility').val();
            
            if(teamId !== "" && role !== "" && responsibility !== ""){
                var dataString = "teamId="+teamId+"&role="+encodeURIComponent(role)+"&responsibility="+encodeURIComponent(responsibility);                

                $.ajax({
                    url: 'files/saveresponsibility.php',		
                    data: dataString,
                    type:'POST',
                    success:function(response){                        
                        clearFormInputFields(); 
                        showListOfResponsibilities();
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }else{
                alert('Enter all the data values in the form');
            }
        });
        
        function clearFormInputFields(){
            $('#slctteam').val('');
            $('#textarearole').val('');
            $('#textarearesponsibility').val('');
        }
        
        function showListOfResponsibilities(){
            $('#subDetailDiv').load('files/showlistofresponsibilities.php');
        }
        
    });//end document.ready function
</script>
