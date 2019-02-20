<?php
session_start();
include("isdk.php");
$name 		= 	$_POST['name'];
$email		= 	$_POST['email'];
$phone 		= 	$_POST['phone'];

$app = new iSDK;
if ($app->cfgCon("connectionName")) 
{
	
	$contactId = $app->addWithDupCheck(array('FirstName' => $name, 'Email' => $email,'Phone1' => $phone), 'Email');
	$_SESSION["name"]	=	$name;
	$_SESSION["email"]	=	$email;
	$_SESSION["phone"]	=	$phone;
	
	$groupId = 10597; 					// Registration  
	$result = $app->grpAssign($contactId, $groupId);
	echo"1";
}
?>
<script>
    window.location="index3.php"
</script>