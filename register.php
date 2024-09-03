<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO samosa (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            header("Location: login2.php?message=thanks for registering please login again");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: poppins;
            background: url(background2.jpg);
        }
        .form-box {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fff;
            padding: 20px;
            width: 800px;
            height: 500px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }
        .img-area {
            flex: 1;
            padding: 20px;
            text-align: center;
        }
        .img-area img {
            max-width: 100%;
            height: auto;
        }
        .form-area {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-area h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .single-form {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
                text-align: center;
                height: auto;
                width: auto;
            }
            .img-area, .form-area {
                flex: none;
            }
            .img-area {
                margin-bottom: 20px;
            }
        }
    </style>
    <div class="form-box">
        <div class="wrapper">
            <div class="img-area">
                <img src="cover2.jpg" alt="">
            </div>
            <div class="form-area">
                <h3>Welcome Hod/Admin</h3>
                <form method="POST" action="">
                    <div class="single-form">
                        <input type="text" name="username" placeholder="Username" id="username" />
                    </div>
                    <div class="single-form">
                        <input type="password" name="password" placeholder="Password" id="password"/>
                    </div>
                    <input type="submit" value="Register" class="btn" id="submit"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
