<?php
include 'db.php';
session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $Team_Number = $_POST['number'];
    $Mentor_Name = $_POST['mname'];
    $Team_Lead = $_POST['lead'];
    $Member_1 = $_POST['name1'];
    $Member_2 = $_POST['name2'];
    $Member_3 = $_POST['name3'];


    // Debugging: Print the received POST data
    var_dump($user_id, $Team_Number, $Mentor_Name, $Team_Lead, $Member_1,$Member_2,$Member_3);

    $sql = "INSERT INTO cookie (user_id, Team_Number, Mentor_Name, Team_Lead, Member_1,Member_2,Member_3) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Debugging: Check the bind_param call
        if ($stmt->bind_param("iisssss", $user_id, $Team_Number, $Mentor_Name, $Team_Lead, $Member_1,$Member_2, $Member_3)) {
            if ($stmt->execute()) {
                header("Location: thanks.html");
                exit();
            } else {
                echo "Error executing statement: " . $stmt->error;
            }
        } else {
            echo "Error binding parameters: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo '<div class="smessage">Enter The Details In The Form Please.</div>';
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <style>
        body{
    background: black;
}
.contact-form{
    background: #fff;
    margin-top: 10%;
    margin-bottom: 5%;
    width: 70%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(0deg);
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: Black;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: black;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #006400cc;
    border: none;
    cursor: pointer;
}
    </style>
<div class="container contact-form">
            <div class="contact-image">
                <img src="icon3.jpg" alt="rocket_contact"/>
            </div>
            <form method="post">
                <h3>Enter Team Details</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="number" class="form-control" placeholder="Team Number*" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="mname" class="form-control" placeholder="Mentor Name*" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="lead" class="form-control" placeholder="Team Lead*" value="" />
                        </div>
                        <div class="form-group">
                        <a href="thanks.html"> <input type="submit" name="btnSubmit" class="btnContact" value="Enter Details" /></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                            <input type="text" name="name1" class="form-control" placeholder="Member-1*" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="name2" class="form-control" placeholder="Member-2*" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="name3" class="form-control" placeholder="Member-3*" value="" />
                        </div>
                    </div>
                </div>
            </form>
</div>
</body>
</html>