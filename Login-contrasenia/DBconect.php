<?php
$db_host="localhost"; //localhost server 
$db_user="test";	//database username
$db_password="test";	//database password   
$db_name="php_multilogin";	//database name

try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}

?>



