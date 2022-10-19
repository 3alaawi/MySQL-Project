<html>
<body>

<?php

$host = 'ec2-52-21-136-176.compute-1.amazonaws.com';
$port = '5432';
$database = 'dae350stsd51e2';
$user = 'anbtnmsnsbhumz';
$password = '7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137';

$connectString = 'host=' . $host . ' port=' . $port . ' dbname=' . $database . 
	' user=' . $user . ' password=' . $password;


$link = pg_connect ($connectString);
if (!$link)
{
	die('Error: Could not connect: ' . pg_last_error());
}


$query = 'select * From records WHERE recordpatientid == $_POST["patientID"]';

$result = pg_query($query);

?>



Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>

</body>
</html>
