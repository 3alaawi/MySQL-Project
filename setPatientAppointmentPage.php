<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Tooth Fairy</title>
        <link href="setPatientAppointmentPage.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </head>
    <body>
        <div class="backBtn">
            <button type="button" id="backBtn" onclick="location.href='receptionistPage.html'">Back</button>
        </div>
        <div class="logoTitle">
            <p>Tooth Fairy</p>
        </div> <br> <br>
        <div class="addAppointmentInfoStatement" id="addApptmtInfoS">
            <p>Fill All Information Below to Create An Appointment</p>
        </div> <br>
        <form method="post" autocomplete="off">
            <p>Identification:</p>
            <input type="text" id="appointmentPatientID" name="appointmentPatientID" placeholder="Patient ID">
            <input type="text" id="appointmentEmployeeID" name="appointmentEmployeeID" placeholder="Employee ID"> <br> <br>
            <p>Date and Time:</p>
            <input type="text" id="appointmentDateDay" name="appointmentDateDay" placeholder="Appointment Day">
            <input type="text" id="appointmentDateMonth" name="appointmentDateMonth" placeholder="Appointment Month">
            <input type="text" id="appointmentDateYear" name="appointmentDateYear" placeholder="Appointment Year">
            <input type="text" id="startTime" name="startTime" placeholder="Start Time (24:00)">
            <input type="text" id="endTime" name="endTime" placeholder="End Time (24:00)"> <br> <br>
            <p>Appointment Details:</p>
            <input type="text" id="appointmentType" name="appointmentType" placeholder="Appointment Type">
            <input type="text" id="appointmentStatus" name="appointmentStatus" placeholder="Appointment Status (Integer)">
            <input type="text" id="roomAssigned" name="roomAssigned" placeholder="Room Assigned"> <br> <br> <br>

            <input type="submit" id="submit" name="confirm" value="submit">

        </form>

        <?php 
            $connection = pg_connect("host=ec2-52-21-136-176.compute-1.amazonaws.com
            dbname=dae350stsd51e2 user=anbtnmsnsbhumz password=7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137");
            if($connection) {
                echo 'connected';
             } else {
                 echo 'there has been an error connecting';
             }

            if(isset($_POST['confirm'])){
                    echo "MADE IT"; 
                    $appointmentid = (int) rand(0, 100000);
                    $appointmentpatientid = (int) $_POST['appointmentPatientID'];
                    $appointmentemployeeid = (int) $_POST['appointmentEmployeeID'];
                    $appointmentdateday = (int) $_POST['appointmentDateDay'];
                    $appointmentdatemonth = $_POST['appointmentDateMonth'];
                    $appointmentdateyear = (int) $_POST['appointmentDateYear'];
                    $starttime = $_POST['startTime'];
                    $endtime = $_POST['endTime'];
                    $appointmenttype = $_POST['appointmentType'];
                    $appointmentstatus = (int) $_POST['appointmentStatus'];
                    $roomassigned = $_POST['roomAssigned'];

                    $queryOne = pg_query($connection, "insert into appointment(appointmentid, appointmentpatientid, appointmentemployeeid, appointmentdateday, appointmentdatemonth, appointmentdateyear, starttime, endtime, appointmenttype, appointmentstatus, roomassigned) values ('$appointmentid', '$appointmentpatientid', '$appointmentemployeeid', '$appointmentdateday', '$appointmentdatemonth', '$appointmentdateyear', '$starttime', '$endtime', '$appointmenttype', '$appointmentstatus', '$roomassigned');"); //Insert Query
                    echo $appointmentid;
                        
                    if($queryOne) {
                        echo "Done!";
                    }
                
            } else {
                echo "DIDNT WORK";
            }
        ?>

    </body>
</html>
