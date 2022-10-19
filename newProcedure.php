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
        <p>Add Procedure</p>
    </div>
    <br>
<<<<<<< HEAD

    <div class="form">
        <form action="appointments.html" method="post">
            <label for="patientID">Patient ID: </label>
            <input type="text" id="patientID" name="patientID" placeholder="XXXX"><br><br>
            <label for="procedure">Add Procedure</label>
            <input type="text" id="procedure" name="procedure"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
=======
>>>>>>> 049ab6f3257bb8697c02f23712cb6afdfb28a2cb
    
    <form method="post" autocomplete="off">
            <p>Identification:</p>
            <input type="text" id="appointmentProcedurePatientID" name="appointmentProcedurePatientID" placeholder="Patient ID">

            <p>Date and Time:</p>
            <input type="text" id="appointmentProcedureDateDay" name="appointmentProcedureDateDay" placeholder="Appointment Day">
            <input type="text" id="appointmentProcedureDateMonth" name="appointmentProcedureDateMonth" placeholder="Appointment Month">
            <input type="text" id="appointmentProcedureDateYear" name="appointmentProcedureDateYear" placeholder="Appointment Year">

            <p>Appointment Details:</p>
            <input type="text" id="procedureType" name="procedureType" placeholder="Procedure Type (Only 4 procedures - 1: Scaling, 2: Fluoride, 3: Root Canal, 4: Filling)">
            <input type="integer" id="procedureCode" name="procedureCode" placeholder="Procedure Type (Integer 'XXXX')"> 
	    <input type="text" id="appointmentProcedureDescription" name="appointmentProcedureDescription" placeholder="Provide a Procedure Description (250 Max Words)"> 
	    <input type="text" id="toothinvolved" name="toothinvolved" placeholder="Provide the tooth to be worked">
	    <br> <br> <br>

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

                    $appointmentProcedureID = (int) rand(0, 100000);
                    $appointmentProcedurePatientID = (int) $_POST['appointmentProcedurePatientID'];

                    $appointmentProcedureDateDay = (int) $_POST['appointmentProcedureDateDay'];
                    $appointmentProcedureDateMonth = $_POST['appointmentProcedureDateMonth'];
                    $appointmentProcedureDateYear = (int) $_POST['appointmentProcedureDateYear'];

                    $procedureType = (int) $_POST['procedureType'];
                    $procedureCode = (int) $_POST['procedureCode'];
 
                    $appointmentProcedureDescription = $_POST['appointmentProcedureDescription'];

                    $toothinvolved = $_POST['toothinvolved'];

                    $amountofprocedureone = (int) rand(0, 10000);

		    $amountofproceduretwo = (int) rand(0, 1000);

		    $amountofprocedurethree = (int) rand(0, 100);
			
		    

<<<<<<< HEAD
                    $queryOne = pg_query($connection, "insert into appointmentprocedure(appointmentProcedureID, appointmentProcedurePatientID, appointmentProcedureDateDay, appointmentProcedureDateMonth, appointmentProcedureDateYear, procedureType, procedureCode, appointmentProcedureDescription, toothinvolved, amountofprocedureone, amountofproceduretwo, amountofprocedurethree) values ('$appointmentProcedureID', '$appointmentProcedurePatientID', '$appointmentProcedureDateDay', '$appointmentProcedureDateMonth', '$appointmentProcedureDateYear', '$procedureType', '$procedureCode', '$appointmentProcedureDescription', '$toothinvolved', '$amountofprocedureone', '$amountofproceduretwo', '$amountofprocedurethree');"); //Insert Query
                    echo $appointmentProcedurePatientID;

                      
=======

                    $queryOne = pg_query($connection, "insert into appointmentprocedure(appointmentProcedureID, appointmentProcedurePatientID, appointmentProcedureDateDay, appointmentProcedureDateMonth, appointmentProcedureDateYear, procedureType, procedureCode, appointmentProcedureDescription, toothinvolved, amountofprocedureone, amountofproceduretwo, amountofprocedurethree) values ('$appointmentProcedureID', '$appointmentProcedurePatientID', '$appointmentProcedureDateDay', '$appointmentProcedureDateMonth', '$appointmentProcedureDateYear', '$procedureType', '$procedureCode', '$appointmentProcedureDescription', '$toothinvolved', '$amountofprocedureone', '$amountofproceduretwo', '$amountofprocedurethree');"); //Insert Query
                    echo $appointmentProcedurePatientID;

>>>>>>> 049ab6f3257bb8697c02f23712cb6afdfb28a2cb
                    if($queryOne) {
                        echo "Done!";
                    }
                
            } else {
                echo "DIDNT WORK";
            }
        ?>


    </body>
</html>
    </body>
</html>
