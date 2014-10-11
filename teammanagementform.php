<h1>Add Team</h1>
<form>
    <table border="0" width="100%">
        <tr>
            <td width="20%">Name:</td>
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
                <table border="0" width="100%">
                    <tr>
                        <td><input type="checkbox" name="chkinterest1" id="chkinterest1" value="Interest 1"/> Interest 1</td>
                        <td><input type="checkbox" name="chkinterest2" id="chkinterest2" value="Interest 2"/> Interest 2</td>
                        <td><input type="checkbox" name="chkinterest3" id="chkinterest3" value="Interest 3"/> Interest 3</td>
                        <td><input type="checkbox" name="chkinterest4" id="chkinterest4" value="Interest 4"/> Interest 4</td>
                        <td><input type="checkbox" name="chkinterest5" id="chkinterest5" value="Interest 5"/> Interest 5</td>
                        <td><input type="checkbox" name="chkinterest6" id="chkinterest6" value="Interest 6"/> Interest 6</td>
                        <td><input type="checkbox" name="chkinterest7" id="chkinterest7" value="Interest 7"/> Interest 7</td>
                    </tr>
                </table>                
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsave"/>                
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
            var interest = "";
            //get the selected checkboxes here            
            $('input[type=checkbox]').each(function () {
                if(this.checked){
                    interest += $(this).val()+",";
                }                
            });

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
