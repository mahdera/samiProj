<?php
    $id = $_GET['id'];
    require_once 'team.php';
    $teamObj = getTeam($id);
?>
<form>
    <table border="0" width="100%">
        <tr>
            <td width="20%">Name:</td>
            <td>
                <input type="text" name="txteditname" id="txteditname" value="<?php echo $teamObj->team_name;?>" size="70"/>
            </td>
        </tr>
        <tr>
            <td>Title:</td>
            <td>
                <input type="text" name="txtedittitle" id="txtedittitle" value="<?php echo $teamObj->title;?>" size="70"/>
            </td>
        </tr>
        <tr>
            <td>Organization:</td>
            <td>
                <input type="text" name="txteditorganization" id="txteditorganization" value="<?php echo $teamObj->organization;?>" size="70"/>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>
                <input type="email" name="txteditemail" id="txteditemail" value="<?php echo $teamObj->email;?>" size="70"/>
            </td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td>
                <input type="tel" name="txteditphone" id="txteditphone" value="<?php echo $teamObj->phone;?>" size="70"/>
            </td>
        </tr>
        <tr>
            <td>Interest:</td>
            <td>
                <table border="0" width="100%">
                    <tr>
                        <?php
                            //i need to explod the team string array separted by comma...
                            $interestArray = explode(",", $teamObj->interest);
                                $checked1 = null;
                                $checked2 = null;
                                $checked3 = null;
                                $checked4 = null;
                                $checked5 = null;
                                $checked6 = null;
                                $checked7 = null;
                                foreach($interestArray as $interestVal){
                                    if($interestVal === "Interest 1"){
                                        $checked1 = "checked";
                                    }else if($interestVal === "Interest 2"){
                                        $checked2 = "checked";
                                    }else if($interestVal === "Interest 3"){
                                        $checked3 = "checked";
                                    }else if($interestVal === "Interest 4"){
                                        $checked4 = "checked";
                                    }else if($interestVal === "Interest 5"){
                                        $checked5 = "checked";
                                    }else if($interestVal === "Interest 6"){
                                        $checked6 = "checked";
                                    }else if($interestVal === "Interest 7"){
                                        $checked7 = "checked";
                                    }
                                    //echo $interestVal.'<br/>';
                                }
                        ?>
                        <td>
                            <?php
                                if($checked1 === "checked"){
                            ?>
                                    <input type="checkbox" name="chkeditinterest1" id="chkeditinterest1" value="Interest 1" checked="checked"/> Interest 1
                            <?php
                                }else{
                            ?>
                                    <input type="checkbox" name="chkeditinterest1" id="chkeditinterest1" value="Interest 1"/> Interest 1
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                if($checked2 === "checked"){
                            ?>
                                    <input type="checkbox" name="chkeditinterest2" id="chkeditinterest2" value="Interest 2" checked="checked"/> Interest 2
                            <?php
                                }else{
                            ?>
                                    <input type="checkbox" name="chkeditinterest2" id="chkeditinterest2" value="Interest 2"/> Interest 2
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                if($checked3 === "checked"){
                            ?>
                                    <input type="checkbox" name="chkeditinterest3" id="chkeditinterest3" value="Interest 3" checked="checked"/> Interest 3
                            <?php
                                }else{
                            ?>
                                    <input type="checkbox" name="chkeditinterest3" id="chkeditinterest3" value="Interest 3"/> Interest 3
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                if($checked4 === "checked"){
                            ?>
                                    <input type="checkbox" name="chkeditinterest4" id="chkeditinterest4" value="Interest 4" checked="checked"/> Interest 4
                            <?php
                                }else{
                            ?>
                                    <input type="checkbox" name="chkeditinterest4" id="chkeditinterest4" value="Interest 4"/> Interest 4
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                if($checked5 === "checked"){
                            ?>
                                    <input type="checkbox" name="chkeditinterest5" id="chkeditinterest5" value="Interest 5" checked="checked"/> Interest 5
                            <?php
                                }else{
                            ?>
                                    <input type="checkbox" name="chkeditinterest5" id="chkeditinterest5" value="Interest 5"/> Interest 5
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                if($checked6 === "checked"){
                            ?>
                                    <input type="checkbox" name="chkeditinterest6" id="chkeditinterest6" value="Interest 6" checked="checked"/> Interest 6
                            <?php
                                }else{
                            ?>
                                    <input type="checkbox" name="chkeditinterest6" id="chkeditinterest6" value="Interest 6"/> Interest 6
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                if($checked7 === "checked"){
                            ?>
                                    <input type="checkbox" name="chkeditinterest7" id="chkeditinterest7" value="Interest 7" checked="checked"/> Interest 7
                            <?php
                                }else{
                            ?>
                                    <input type="checkbox" name="chkeditinterest7" id="chkeditinterest7" value="Interest 7"/> Interest 7
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="btnupdate"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){      

        $('#btnupdate').click(function(){
            var id = "<?php echo $id;?>";
            var teamName = $('#txteditname').val();
            var title = $('#txtedittitle').val();
            var organization = $('#txteditorganization').val();
            var email = $('#txteditemail').val();
            var phone = $('#txteditphone').val();
            var interest = "";
            //get the selected checkboxes here
            $('#teamEditDiv input:checked').each(function () {
                if(this.checked){
                    interest += $(this).val()+",";
                }
            });
            var dataString = "name="+encodeURIComponent(teamName)+"&title="+encodeURIComponent(title)+"&organization="+
                        encodeURIComponent(organization)+"&email="+encodeURIComponent(email)+"&phone="+encodeURIComponent(phone)+"&interest="+
                        encodeURIComponent(interest)+"&id="+id;
            $.ajax({
                url: 'files/updateteam.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    showListOfTeams();
                },
                error:function(error){
                    alert(error);
                }
            });
        });

        function showListOfTeams(){
            $('#subDetailDiv').load('files/showlistofteams.php');
        }

    });//end document.ready function
</script>
