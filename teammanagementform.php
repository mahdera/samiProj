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
<div id="subDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){
        
        showListOfTeams();
        
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
                $.ajax({
                    url: 'files/saveteam.php',		
                    data: dataString,
                    type:'POST',
                    success:function(response){                        
                        clearFormInputFields(); 
                        showListOfTeams();
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }else{
                alert('Enter all the data fields');
            }
        });
        
        function clearFormInputFields(){
            $('#txtname').val('');
            $('#txttitle').val('');
            $('#txtorganization').val('');
            $('#txtemail').val('');
            $('#txtphone').val('');
            $('#slctinterest').val('');
        }
        
        function showListOfTeams(){
            $('#subDetailDiv').load('files/showlistofteams.php');
        }
        
    });//end document.ready function
</script>