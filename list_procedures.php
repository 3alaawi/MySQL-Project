<?php

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("ec2-52-21-136-176.compute-1.amazonaws.com"));
$cleardb_server = $cleardb_url["5432"];
$cleardb_username = $cleardb_url["anbtnmsnsbhumz"];
$cleardb_password = $cleardb_url["7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137"];
$cleardb_db = substr($cleardb_url["ec2-52-21-136-176.compute-1.amazonaws.com"],1);
$active_group = 'default';
$query_builder = TRUE;

// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Gets the employeeBranchID and the employeetype when it is equal to dentist displaying the employeeBranchID and all dentists across all branches
//Can use BranchID to get names if necessary
$sql = "SELECT employeeBranchID, verifiedProcedureOne, verifiedProcedureTwo, verifiedProcedureThree FROM employee WHERE employeeType = 'dentist'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["employeeBranchID"]. " - verifiedProcedureOne: " . $row["verifiedProcedureOne"]." - verifiedProcedureTwo: " . $row["verifiedProcedureTwo"]." - verifiedProcedureThree: " . $row["verifiedProcedureThree"]. "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();
?>