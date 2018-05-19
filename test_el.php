<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<form action="page.cgi" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
<input name="txt1" type="text" id="txt1" value="Value">
<input name="rdo1" type="radio" value="Y" checked onClick="javaScript:if(this.checked){document.all.txt1.style.display='';}"> 
ส่ง
<input name="rdo1" type="radio" value="N" onClick="javaScript:if(this.checked){document.all.txt1.style.display='none';}"> 
ไม่ส่ง
<br>
<br>
<input name="chk1" type="checkbox" id="chk1" value="Y" checked>
Checkbox
<input name="rdo2" type="radio" value="Y" checked onClick="javaScript:if(this.checked){document.all.chk1.style.display='';}">
Show
<input name="rdo2" type="radio" value="N" onClick="javaScript:if(this.checked){document.all.chk1.style.display='none';}">
Hide<br>
<br>
<table width="196"  type="text" id="tbName">
  <tr>
    <td>&nbsp;</td>
    </tr>
</table>
<input name="rdo3" type="radio" value="1" checked onClick="javaScript:if(this.checked){document.all.tbName.style.display='';}">
ส่ง
<input name="rdo3" type="radio" value="0" onClick="javaScript:if(this.checked){document.all.tbName.style.display='none';}">
ไม่ส่ง<br>
<br>
<span id="spName">Text www.ThaiCreate.Com</span>
<input name="rdo4" type="radio" value="Y" checked onClick="javaScript:if(this.checked){document.all.spName.style.display='';}">
Show
<input name="rdo4" type="radio" value="N" onClick="javaScript:if(this.checked){document.all.spName.style.display='none';}">
Hide<br>
<br>
<input name="btnSubmit" type="submit" value="Submit" onClick="JavaScript:this.disabled=true;">
</form>
</body>
</html>
