<?php

include("connect.php");

print_r($_POST);


if($_POST)
{

	$sql_select = "SELECT * from support where col_id=1";
	$query_select = mysql_query($sql_select);
	$row_select = mysql_fetch_array($query_select);
	$num_select = mysql_num_rows($query_select);
	if($num_select > 0 )
	{
		$sql = "UPDATE support set col_code = '".$_POST["col_code"]."' where col_id=1";
		$query =  mysql_query($sql);
		echo $sql;

		if($query == 1)
		{
			header('Location: http://localhost/project/content/examples/home.php');
		}
	}
	else
	{
		$sql = "SELECT * from support (col_code) values ('".$_POST["col_code"]."'";
		$query =  mysql_query($sql);
		if($query == 1)
		{
			header('Location: http://localhost/project/content/examples/home.php');
		}
	}
	//echo $sql;

}



?>