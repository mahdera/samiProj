<h2>Form 1</h2>
<form>
    <table border="1" width="100%">
        <tr>
            <td>Title</td>
            <td>
                <input type="text" name="txttitle" id="txttitle"/>
            </td>
        </tr>
        <tr>
            <td>Date:</td>
            <td>
                <input type="text" id="datepicker" />
            </td>
        </tr>
        <tr>
            <td>Plan:</td>
            <td>
                <textarea name="textareaplan" id="textareaplan" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td>Q3:</td>
            <td>
                <textarea name="textareaplan" id="textareaplan" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td>Q4:</td>
            <td>
                <textarea name="textareaplan" id="textareaplan" style="width: 100%" rows="3"></textarea>
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
<script type="text/javascript">
    $(document).ready(function(){       
        $( "#datepicker" ).datepicker({
            changeMonth: true,//this option for allowing user to select month
            changeYear: true //this option for allowing user to select from year range
        });
    });//end document.ready function
</script>