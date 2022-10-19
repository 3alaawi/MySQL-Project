<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Tooth Fairy</title>
        <link href="editPatientInfo.css" rel="stylesheet" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </head>
    <body>
        <div class="backBtn">
            <button type="button" id="backBtn" onclick="location.href='receptionistPage.html'">Back</button>
        </div>
        <div class="logoTitle">
            <p>Tooth Fairy</p>
        </div> <br> <br>
        <div class="editPatientInfoStatement" id="editPInfoS">
            <p>Fill All Information Below to Update a Patient's Information</p>
        </div> <br>
        <form method="post" autocomplete="off">
            <p>Identification of the Patient You Want to Edit:</p>
            <input type="text" id="ssn" name="ssn" placeholder="SSN"> <br> <br>
            <p>Full Name:</p>
            <input type="text" id="userFirstName" name="userFirstName" placeholder="First Name">
            <input type="text" id="userMiddleName" name="userMiddleName" placeholder="Middle Name">
            <input type="text" id="userLastName" name="userLastName" placeholder="Last Name"> <br> <br>
            <p>Address:</p>
            <input type="text" id="houseNumber" name="houseNumber" placeholder="House Number">
            <input type="text" id="streetName" name="streetName" placeholder="Street Name">
            <input type="text" id="city" name="city" placeholder="City">
            <input type="text" id="province" name="province" placeholder="Province"> <br> <br>
            <p>Gender and Age:</p>
            <input type="text" id="gender" name="gender" placeholder="Gender"> <br> <br>
            <input type="text" id="age" name="age" placeholder="Age"> <br> <br>
            <p>Contact Information:</p>
            <input type="text" id="emailAddress" name="emailAddress" placeholder="Email Address">
            <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Phone Number (No Dashes)"> <br> <br>
            <p>Birth Date:</p>
            <input type="text" id="birthDay" name="birthDay" placeholder="Birth Day"> 
            <input type="text" id="birthMonth" name="birthMonth" placeholder="Birth Month">
            <input type="text" id="birthYear" name="birthYear" placeholder="Birth Year"> <br> <br>
            <p>Dependant(s):</p>
            <input type="text" id="dependantOneFirstName" name="dependantOneFirstName" placeholder="First Name (Dependant 1)">
            <input type="text" id="dependantOneMiddleName" name="dependantOneMiddleName" placeholder="Middle Name (Dependant 1)">
            <input type="text" id="dependantOneLastName" name="dependantOneLastName" placeholder="Last Name (Dependant 1)"> 
            <input type="text" id="dependantOneAge" name="dependantOneAge" placeholder="Age (Dependant 1)"> <br> <br>
            <input type="text" id="dependantTwoFirstName" name="dependantTwoFirstName" placeholder="First Name (Dependant 2)">
            <input type="text" id="dependantTwoMiddleName" name="dependantTwoMiddleName" placeholder="Middle Name (Dependant 2)">
            <input type="text" id="dependantTwoLastName" name="dependantTwoLastName" placeholder="Last Name (Dependant 2)"> 
            <input type="text" id="dependantTwoAge" name="dependantTwoAge" placeholder="Age (Dependant 2)"> <br> <br>
            <input type="text" id="dependantThreeFirstName" name="dependantThreeFirstName" placeholder="First Name (Dependant 3)">
            <input type="text" id="dependantThreeMiddleName" name="dependantThreeMiddleName" placeholder="Middle Name (Dependant 3)">
            <input type="text" id="dependantThreeLastName" name="dependantThreeLastName" placeholder="Last Name (Dependant 3)">
            <input type="text" id="dependantThreeAge" name="dependantThreeAge" placeholder="Age (Dependant 3)"> <br> <br>
            <p>Insurance:</p>
            <input type="text" id="insuraceNumber" name="insuraceNumber" placeholder="Insurance Number" min="0"> <br> <br>
            <p>User Type (Patient = 0, Employee = 1):</p>
            <input type="text" id="userType" name="userType"> <br> <br> <br>
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
                    $userfirstname = $_POST['userFirstName'];
                    $userlastname = $_POST['userLastName'];
                    $usermiddlename = $_POST['userMiddleName'];
                    $ssn = (int) $_POST['ssn'];
                    $housenumber = (int) $_POST['houseNumber'];
                    $streetname = $_POST['streetName'];
                    $city = $_POST['city'];
                    $province = $_POST['province'];
                    $gender = $_POST['gender'];
                    $age = (int) $_POST['age'];
                    $emailaddress = $_POST['emailAddress'];
                    $phonenumber = $_POST['phoneNumber'];
                    $birthday = (int) $_POST['birthDay'];
                    $birthmonth = $_POST['birthMonth'];
                    $birthyear = (int) $_POST['birthYear'];
                    $insuracenumber = (int) $_POST['insuraceNumber'];
                    $usertype = (int) $_POST['userType'];

                    $queryOne = pg_query($connection, "update users set housenumber = '$housenumber', streetname = '$streetname', city = '$city', province = '$province', userfirstname = '$userfirstname', usermiddlename = '$usermiddlename', userlastname = '$userlastname', gender = '$gender', age = '$age', insuracenumber = '$insuracenumber', emailaddress = '$emailaddress', birthday = '$birthday', birthmonth = '$birthmonth', birthyear = '$birthyear', usertype = '$usertype', phonenumber = '$phonenumber' where ssn = '$ssn';"); //Insert Query
    
                        
                    if($queryOne) {
                        echo "Done!";
                    }
                            
            } else {
                echo "DIDNT WORK";
            }
        ?>

    </body>
</html>
