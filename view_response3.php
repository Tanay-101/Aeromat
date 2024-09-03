<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'vadapav');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$sql = "SELECT Team_Number, Mentor_Name, Team_Lead, Member_1, Member_2, Member_3 FROM cookie";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Updates</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
        .container {
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 10px;
            padding-right: 10px;
        }
        h2 {
            font-size: 26px;
            margin: 20px 0;
            text-align: center;
        }
        .responsive-table {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .responsive-table li {
            border-radius: 3px;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
        }
        .table-header {
            background-color: #95A5A6;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }
        .table-row {
            background-color: #ffffff;
            box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
        }
        .col-1 {
            flex-basis: 10%;
        }
        .col-2 {
            flex-basis: 25%;
        }
        .col-3 {
            flex-basis: 20%;
        }
        .col-4 {
            flex-basis: 15%;
        }
        .col-5 {
            flex-basis: 15%;
        }
        .col-6 {
            flex-basis: 15%;
        }
        @media all and (max-width: 767px) {
            .table-header {
                display: none;
            }
            li {
                display: block;
            }
            .col {
                flex-basis: 100%;
                display: flex;
                padding: 10px 0;
            }
            .col:before {
                color: #6C7A89;
                padding-right: 10px;
                content: attr(data-label);
                flex-basis: 50%;
                text-align: right;
            }
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            margin-left:490px;
            background-color: #121213;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
    <div class="container">
        <h2>Team Details</h2>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Team Number</div>
                <div class="col col-2">Mentor Name</div>
                <div class="col col-3">Team Lead</div>
                <div class="col col-4">Member 1</div>
                <div class="col col-5">Member 2</div>
                <div class="col col-6">Member 3</div>
            </li>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $row): ?>
                    <li class="table-row">
                        <div class="col col-1" data-label="Team Number"><?php echo htmlspecialchars($row['Team_Number']); ?></div>
                        <div class="col col-2" data-label="Mentor Name"><?php echo htmlspecialchars($row['Mentor_Name']); ?></div>
                        <div class="col col-3" data-label="Team Lead"><?php echo htmlspecialchars($row['Team_Lead']); ?></div>
                        <div class="col col-4" data-label="Member 1"><?php echo htmlspecialchars($row['Member_1']); ?></div>
                        <div class="col col-5" data-label="Member 2"><?php echo htmlspecialchars($row['Member_2']); ?></div>
                        <div class="col col-6" data-label="Member 3"><?php echo htmlspecialchars($row['Member_3']); ?></div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="table-row">
                    <div class="col col-1" data-label="Team Number">N/A</div>
                    <div class="col col-2" data-label="Mentor Name">No data available</div>
                    <div class="col col-3" data-label="Team Lead">N/A</div>
                    <div class="col col-4" data-label="Member 1">N/A</div>
                    <div class="col col-5" data-label="Member 2">N/A</div>
                    <div class="col col-6" data-label="Member 3">N/A</div>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <a href="index.html" class="button">Back to Home Page</a>

</body>
</html>
