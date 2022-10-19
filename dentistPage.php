<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Tooth Fairy</title>
        <link href="dentist.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <div class="backBtn">
        <button type="button" id="backBtn" onclick="location.href='homePage.html'">Back</button>
    </div>

    <div class="logoTitle">
        <p>Tooth Fairy</p>
    </div>
    <br>
    <br>

    <div class="welcome" id="welcome">
        <p>Welcome</p>
        <p>Enter Dentist ID</p>
    </div>
    <br>

    <div class="form">
        <form action="appointments.php" method="get">
            <label for="dentistID">Dentist ID: </label>
            <input type="number" id="dentistID" name="dentistID" placeholder="XXXX"><br><br>

            <p>Date</p>
            <label for="day">Day:</label>

            <input type="number" id="dateDay" name="dateDay" placeholder="XX"><br><br>

            <label for="month">Month:</label>
            <input type="text" id="dateMonth" name="dateMonth" placeholder="abc"><br><br>

            <label for="year">Year:</label>
            <input type="number" id="dateYear" name="dateYear" placeholder="XXXX"><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>
    <br>

    <div class="center">
    <input type="submit" name="listDentists" value="List all Dentists" />
    <br>
    <input type="submit" name="listprocedure" value="Lists all Procedures" />
    </div>

        
    <?php
        if(isset($_POST['listDentists']))
        {
             func();
         }
        function func()
        {

            // Connect to DB
            $conn = pg_connect("host=ec2-52-21-136-176.compute-1.amazonaws.com
            dbname=dae350stsd51e2 user=anbtnmsnsbhumz password=7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137");

            // Check connection
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }

            //Gets the employeeBranchID and the employeetype when it is equal to dentist displaying the employeeBranchID and all dentists across all branches
            //Can use BranchID to get names if necessary
            $sql = "SELECT employeeBranchID, employeeType FROM employee WHERE employeeType = 'dentist'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "id: " . $row["employeeBranchID"]. " - employeeType: " . $row["employeeType"]. "<br>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();  
        }
    
        if(isset($_POST['listprocedure']))
        {
             func1();
        }
        function func1()
        {
            // Connect to DB
            $conn = pg_connect("host=ec2-52-21-136-176.compute-1.amazonaws.com
            dbname=dae350stsd51e2 user=anbtnmsnsbhumz password=7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137");

            // Check connection
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }

            //Gets the employeeBranchID and the employeetype when it is equal to dentist displaying the employeeBranchID and all dentists across all branches
            //Can use BranchID to get names if necessary
            $sql = "SELECT employeeID, employeeBranchID, verifiedProcedureOne, verifiedProcedureTwo, verifiedProcedureThree FROM employee WHERE employeeType = 'dentist'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "Employee id: " . $row["employeeID"]. "Branch id: " . $row["employeeBranchID"]. " - verifiedProcedureOne: " . $row["verifiedProcedureOne"]." - verifiedProcedureTwo: " . $row["verifiedProcedureTwo"]." - verifiedProcedureThree: " . $row["verifiedProcedureThree"]. "<br>";
                }
            } else {
                echo "0 results";
            } 

            $conn->close(); 
        }
   
        // Connect to DB
        $conn = pg_connect("host=ec2-52-21-136-176.compute-1.amazonaws.com
        dbname=dae350stsd51e2 user=anbtnmsnsbhumz password=7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $date=$_GET["date"];

        $id=$_GET["dentistID"];

        $dateHolder=(explode("/",$date));

        //Splits the entered date given as DD/MM/YYYY into individual strings in order to be used in searching the DB
        $day= $dateHolder[0].$dateHolder[1];
        $month=$dateHolder[3].$dateHolder[4];
        $year=$dateHolder[6].$dateHolder[7].$dateHolder[8].$dateHolder[9];

        //Gets the employeeBranchID and the employeetype when it is equal to dentist displaying the employeeBranchID and all dentists across all branches
        //Can use BranchID to get names if necessary
        $sql = "SELECT appointmentEmployeeID, startTime, endTime, appointmentType,  appointmentStatus, roomAssigned
         FROM appointment WHERE appointmentEmployeeID='.$id.' AND appointmentStatus != '0' AND appointmentDateDay = '$day' AND appointmentDateMonth= '$month' AND appointmentDateYear = '$year'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "id: " . $row["appointmentEmployeeID"]. " - startTime: " . $row["startTime"]. " - endTime: " . $row["endTime"]. " - appointmentType: " . $row["appointmentType"]. " - appointmentStatus: " . $row["appointmentStatus"]." - roomAssigned: " . $row["roomAssigned"]. "<br>";
        }
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>

    </body>
    
</html>
