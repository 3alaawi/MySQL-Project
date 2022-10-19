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
                    
                    $query = pg_query("SELECT * FROM records WHERE recordpatientid = '$patientID'");
                    if(pg_num_rows($query) == 1){
                        $result = pg_query($connection, "SELECT recordid, previousprocedureone,previousproceduretwo,previousprocedurethree,previousprocedurefour,previousprocedurefive FROM records WHERE recordpatientid = '$patientID'");
                        while ($row = pg_fetch_row($result)){
                            echo"<div class='welcome' id='welcome'>
                                 <p>Your Medical History:</p>
                                 <br></div>";
                            echo"<div class='history' id='history'>";
                            echo "<h3>ID:</h3>";
                            echo "<h3 align=center>$row[0] </h3>";
                            echo "<table class = 'center'>";
                            echo "<th>Procedure(s):</th>";
                            echo "<tr><td> <p align=center>$row[1] </p></td></tr>";
                            echo "<tr><td> <p align=center>$row[2] </p></td></tr>";
                            echo "<tr><td> <p align=center>$row[3] </p></td></tr>";
                            echo "<tr><td> <p align=center>$row[4] </p></td></tr>";
                            echo "<tr><td> <p align=center>$row[5] </p></td></tr>";
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