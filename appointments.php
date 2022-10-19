<html>

 <head>
     <title>Today Appointment</title>
     <link href="appointments.css" rel="stylesheet" type="text/css">
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
         <h1>Todays Appointments</h1>
     </div>
     <br>

     <p> Welcome Dentist
         <?php
         $connection = pg_connect("host=ec2-52-21-136-176.compute-1.amazonaws.com
         dbname=dae350stsd51e2 user=anbtnmsnsbhumz password=7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137");

      $dentist = $_GET["dentistID"];
      echo $dentist; ?>
      </p><br>

     <p> Todays patients are:

         <?php
         $connection = pg_connect("host=ec2-52-21-136-176.compute-1.amazonaws.com
                     dbname=dae350stsd51e2 user=anbtnmsnsbhumz password=7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137");

         //single query
         //$queryOne = pg_query($connection, "SELECT appointmentpatientid FROM appointment WHERE appointmentemployeeid = dentistID AND appointmentdateday = dateDay AND appointmentdatemonth = dateMonth AND  appointmentdateyear = dateYear");

         $day = $_GET["dateDay"];
         $month = $_GET["dateMonth"];
         $year = $_GET["dateYear"];

           //putting everything into an array

             $result = pg_query($connection, "SELECT appointmentpatientid FROM appointment WHERE appointmentemployeeid = '$dentist' AND appointmentdateday = '$day' AND appointmentdatemonth = '$month' AND  appointmentdateyear = '$year'");
             while ($row = pg_fetch_row($result)){
                 echo "<div class='results'>";
                 echo "<table>";
                 echo "<tr>";
                 echo "<td> <p align=center>$row[0] </p></td>";
                 echo "<td> <p align=center>$row[1] </p></td>";
                 echo "<td> <p align=center>$row[2] </p></td>";
                 echo "<td> <p align=center>$row[3] </p></td>";
                 echo "<td> <p align=center>$row[4] </p></td>";
                 echo "<td> <p align=center>$row[5] </p></td>";
                 echo "</tr>";
                 echo "</table>";
                 echo "</div>";
             }

        ?>
     </p><br>

    <div class="medHistory" id="medHistory">
        <button type="button" id="button1" onclick="location.href='patientMedicalHistory.php'">Medical History</button>
    </div>

    <div class="newProcedure" id="newProcedure">
        <button type="button" id="button2" onclick="location.href='newProcedure.php'">Administer Procedure</button>
    </div>

    </body>
</html>