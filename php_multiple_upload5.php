<html>
<head>
<title>ThaiCreate.Com JavaScript Add/Remove Element</title>
</head>
<?
mysql_connect("localhost","root","123456789");
mysql_select_db("management");
$strSQL = "SELECT * FROM teacher";
$objQuery = mysql_query($strSQL);
?>
<script language="javascript">

	function fncCreateSelectOption(ele)
		{
			var objSelect = ele;
			var Item = new Option("", ""); 
			objSelect.options[objSelect.length] = Item;
			<?
			while($objResult = mysql_fetch_array($objQuery))
			{
			?>
			var Item = new Option("<?=$objResult["no"];?>", "<?=$objResult["tech_name"];?>"); 
			objSelect.options[objSelect.length] = Item;
			<?
			}
			?>
		}

	function fncCreateElement(){
		
	   var mySpan = document.getElementById('mySpan');

	   var myLine = document.getElementById('hdnLine');

	   myLine.value++;
	   // Create input text
	   var myElement1 = document.createElement('input');
	   myElement1.setAttribute('type',"text");
	   myElement1.setAttribute('name',"txtGalleryName"+myLine.value);
	   myElement1.setAttribute('id',"txt"+myLine.value);
	   mySpan.appendChild(myElement1);	
	   
	   // Create input file
	   var myElement2 = document.createElement('input');
	   myElement2.setAttribute('type',"file");
	   myElement2.setAttribute('name',"fileUpload"+myLine.value);
	   myElement2.setAttribute('id',"fil"+myLine.value);
	   mySpan.appendChild(myElement2);	

	   // Create select
	   var myElement3 = document.createElement('select');
	   myElement3.setAttribute('name',"selSelect"+myLine.value);
	   myElement3.setAttribute('id',"sel"+myLine.value);
	   mySpan.appendChild(myElement3);	

	   // Create Option //
	   fncCreateSelectOption(myElement3)
		
       // Create <br>
	   var myElement3 = document.createElement('<br>');
	   myElement3.setAttribute('id',"br"+myLine.value);
	   mySpan.appendChild(myElement3);
	}

	function fncDeleteElement(){

		var mySpan = document.getElementById('mySpan');

		var myLine = document.getElementById('hdnLine');
		
		if(myLine.value > 1 )
		{

			// Remove input text
			var deleteFile = document.getElementById("txt"+myLine.value);
			mySpan.removeChild(deleteFile);

			// Remove input file
			var deleteFile = document.getElementById("fil"+myLine.value);
			mySpan.removeChild(deleteFile);

			// Remove select
			var deleteFile = document.getElementById("sel"+myLine.value);
			mySpan.removeChild(deleteFile);

			// Remove <br>
			var deleteBr = document.getElementById("br"+myLine.value);
			mySpan.removeChild(deleteBr);

			myLine.value--;
		}
	}
</script>
<body>
	<form action="php_multiple_upload5.php" method="post" name="form1" enctype="multipart/form-data">
		<span id="mySpan"></span>
		<input name="btnCreate" type="button" value="+" onClick="JavaScript:fncCreateElement();">
		<input name="btnDelete" type="button" value="-" onClick="JavaScript:fncDeleteElement();"><br>			
		<input name="hdnLine" id="hdnLine" type="hidden" value="0">
	</form>
</body>
</html>