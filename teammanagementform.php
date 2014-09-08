<h2>Add Team</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Name:</td>
            <td>
                <input type="text" name="txtname" id="txtname"/>
            </td>
        </tr>
        <tr>
            <td>Title:</td>
            <td>
                <input type="text" name="txttitle" id="txttitle"/>
            </td>
        </tr>
        <tr>
            <td>Organization:</td>
            <td>
                <input type="text" name="txtorganization" id="txtorganization"/>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>
                <input type="email" name="txtemail" id="txtemail"/>
            </td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td>
                <input type="tel" name="txtphone" id="txtphone"/>
            </td>
        </tr>
        <tr>
            <td>Interest:</td>
            <td>
                <select name="slctinterest" id="slctinterest" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
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
<div id="teamDetailDiv"></div>
<div>
    <?php
        //now display the saved data back to the user...
    require_once 'files/dbconnection.php';
    require_once 'files/team.php';
    $teamList = getAllTeams();
    if(!empty($teamList)){
        ?>
            <table border="0" width="100%">
                <tr style="background: #ccc">
                    <td>#</td>
                    <td>Name</td>
                    <td>Title</td>
                    <td>Organization</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Interest</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                <?php
                    $ctr=1;
                    while($teamRow = mysql_fetch_object($teamList)){
                        ?>
                        <tr>
                            <td><?php echo $ctr++;?></td>
                            <td><?php echo $teamRow->team_name;?></td>
                            <td><?php echo $teamRow->title;?></td>
                            <td><?php echo $teamRow->organization;?></td>
                            <td><?php echo $teamRow->email;?></td>
                            <td><?php echo $teamRow->phone;?></td>
                            <td><?php echo $teamRow->interest;?></td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        <?php
                    }//end while loop
                ?>
            </table>
        <?php
    }
    ?>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnsave').click(function(){
            var name = $('#txtname').val();
            var title = $('#txttitle').val();
            var organization = $('#txtorganization').val();
            var email = $('#txtemail').val();
            var phone = $('#txtphone').val();
            var interest = $('#slctinterest').val();

            if(name !== "" && title !== "" && organization !== "" && email !== "" &&
                    phone !== "" && interest !== ""){
                var dataString = "name="+encodeURIComponent(name)+"&title="+encodeURIComponent(title)+"&organization="+
                        encodeURIComponent(organization)+"&email="+email+"&phone="+phone+"&interest="+
                        encodeURIComponent(interest);
                $('#teamDetailDiv').load('files/saveteam.php?'+dataString);                
            }else{
                alert('Enter all the data fields');
            }
        });
    });//end document.ready function
</script>