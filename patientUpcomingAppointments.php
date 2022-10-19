<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Tooth Fairy</title>
        <link href="patient.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="backBtn">
            <button type="button" id="backBtn" onclick="location.href='patientPage.html'">Back</button>
        </div>
        <div class="logoTitle">
            <p>Tooth Fairy</p>
        </div> <br> <br>

        <div class="welcome" id="welcome">
            <p>Enter Your Patient ID:</p>
        </div> <br>

        <div class="welcome" id="welcome">
        <form method="post">
            <input type="text" name="patientID"><br>
            <input type="submit" id="submit" name="submit" value="submit">
        </form>
        </div>

        <?php 
            $connection = pg_connect("host=ec2-52-21-136-176.compute-1.amazonaws.com
            dbname=dae350stsd51e2 user=anbtnmsnsbhumz password=7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137");
            if($connection) {
                echo 'connected';
             } else {
                 echo 'there has been an error connecting';
             }

            if($_POST['submit']){
                    echo "MADE IT"; 
                    $patientID = $_POST['patientID'];
                    
                    $query = pg_query($connection, "SELECT * FROM appointment WHERE appointmentpatientid = '$patientID'");
                    if(pg_num_rows($query) > 0){
                        echo"<div class='welcome' id='welcome'>
                        <p>Your Upcoming Appointments:</p>
                        <br></div>";
                        $result = pg_query($connection, "SELECT appointmentid,appointmentpatientid, appointmentemployeeid,appointmentdateday,appointmentdatemonth,appointmentdateyear,starttime,endtime,appointmenttype,appointmentstatus,roomassigned FROM appointment WHERE appointmentpatientid = '$patientID'");
                        while ($row = pg_fetch_row($result)){
                            echo "<table class = 'center'>";
                            echo "<tr>";
                            echo "<th>Appointment ID</th>";
                            echo "<th>Employee ID</th>";
                            echo "<th>Day</th>";
                            echo "<th>Month</th>";
                            echo "<th>Year</th>";
                            echo "<th>Start Time</th>";
                            echo "<th>End Time</th>";
                            echo "<th>Appointment Type</th>";
                            echo "<th>Appointment Status</th>";
                            echo "<th>Room Number:</th>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td> <p align=center>$row[0] </p></td>";
                            echo "<td> <p align=center>$row[2] </p></td>";
                            echo "<td> <p align=center>$row[3] </p></td>";
                            echo "<td> <p align=center>$row[4] </p></td>";
                            echo "<td> <p align=center>$row[5] </p></td>";
                            echo "<td> <p align=center>$row[6] </p></td>";
                            echo "<td> <p align=center>$row[7] </p></td>";
                            echo "<td> <p align=center>$row[8] </p></td>";
                            echo "<td> <p align=center>$row[9] </p></td>";
                            echo "<td> <p align=center>$row[10] </p></td>";
                            echo "</tr>";
                            echo "</table>";
                            echo "</div>";
                        }
                    
                    }
                    
                    //
                     
                    if($query) {
                        echo $query;
                        echo "Done!";
                    }
    
                
            } else {
                echo "DIDNT WORK";
            }
        ?>


    </body>
</html>