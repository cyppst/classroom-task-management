
<?php 
include ("header.php");
include ("connect.php");
$strSQL5 = "SELECT * FROM examination WHERE exa_id = '39' ";
$objQuery5 = mysqli_query($con,$strSQL5) or die ("Error Query [".$strSQL3."]");
$objResult5 = mysqli_fetch_array($objQuery5);
?>
<table id="scoring">
    <tr><td>hhh</td>
    	<td>hhh</td>
    	<td>hhh</td>
    	<td>hhh</td>
        <td><input type="text" name="total[]" value="0" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" /></td>
    </tr>
    <tr><td>hhh</td>
    	
        <td><input type="text" name="stu_name[]"value="0" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"  /></td>
    </tr>    

</table>

<script src="http://code.jquery.com/jquery-1.8.3.js "></script>
<script>
$(document).ready(function(){
	var body = $("#scoring tr td:nth-child(2)"),
	title_full = <?php echo $objResult5["exa_score"]; ?>;   
	$("input:text",body).keyup(function(){
		if(!$(this).val().match("^([\+\-]?[0-9]*[\.]?[0-9]?[0-9]?)$")){
			$(this).val('');		
		}
		if($(this).val() > title_full ){ alert('คะแนน '+$(this).val()+' เกินค่ะ'); $(this).focus();  }        
	});
});
</script>