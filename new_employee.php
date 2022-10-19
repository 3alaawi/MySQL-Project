<?php
/* This takes in data needed to add an employee, randomly generates a employeID and SSN, however needs to be authenticated as
an admin/manger before being able to add employee's */
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("ec2-52-21-136-176.compute-1.amazonaws.com"));
$cleardb_server = $cleardb_url["5432"];
$cleardb_username = $cleardb_url["anbtnmsnsbhumz"];
$cleardb_password = $cleardb_url["7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137"];
$cleardb_db = substr($cleardb_url["ec2-52-21-136-176.compute-1.amazonaws.com"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$link = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$randomid_employeeID = (rand(1,1000000));
$randomid_employeeSSN = (rand(100000000,999999999));

// Escape user inputs for security
$salary = mysqli_real_escape_string($link, $_REQUEST['salary']);
$employeeBranchID = mysqli_real_escape_string($link, $_REQUEST['employeeBranchID']);
$employeeRole = mysqli_real_escape_string($link, $_REQUEST['employeeRole']);
$employeeType = mysqli_real_escape_string($link, $_REQUEST['employeeType']);
$verifiedProcedureOne= mysqli_real_escape_string($link, $_REQUEST['verifiedProcedureOne']);
$verifiedProcedureTwo = mysqli_real_escape_string($link, $_REQUEST['verifiedProcedureTwo']);
$verifiedProcedureThree = mysqli_real_escape_string($link, $_REQUEST['verifiedProcedureThree']);


// Attempt insert query execution
$sql = "INSERT INTO employee (randomid_employeeID, randomid_employeeSSN, salary, employeeBranchID, employeeRole, employeeType, verifiedProcedureOne, verifiedProcedureTwo, verifiedProcedureThree)
                             VALUES ('$randomid_employeeID', '$randomid_employeeSSN', '$salary', '$employeeBranchID', '$employeeRole', '$employeeType', '$verifiedProcedureOne', '$verifiedProcedureTwo', '$verifiedProcedureThree')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>