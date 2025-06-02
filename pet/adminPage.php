<?php include 'db_connection.php'; 

$login_sql = "SELECT * FROM logintable";
$donate_sql = "SELECT * FROM donate";
$volunteer_sql = "SELECT * FROM volunteer";
$adopt_sql = "SELECT * FROM adopt";

$login_result = $conn->query($login_sql);
$donate_result = $conn->query($donate_sql);
$volunteer_result = $conn->query($volunteer_sql);
$adopt_result = $conn->query($adopt_sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
   <!-- <link rel="stylesheet" href="styles.css">-->
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #007BFF; /* Blue color */
            margin-top: 20px;
        }

        /* Sign-out Button */
        form {
            text-align: right;
            margin: 20px;
        }

        button[type="submit"] {
            background-color: #007BFF; /* Blue color */
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue color */
        }

        /* Table Styles */
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007BFF; /* Blue color */
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Responsive Design for Mobile */
        @media (max-width: 600px) {
            table {
                width: 100%;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    

    <h2><center>Login Table</center></h2>
    <table>
        <tr>
            
            <th>Username</th>
            <th>Name</th>
            <th>Password</th>
            <th>Email</th>
            <th>Phone number</th>
        </tr>
        <?php
        if ($login_result->num_rows > 0) {
            while($row = $login_result->fetch_assoc()) {
                echo "<tr><td>" . $row["username"] . "</td><td>" . $row["name"] . "</td><td>" . $row["password"] . "</td><td>" . $row["email"] ."</td><td>" . $row["phone"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No results</td></tr>";
        }
        ?>
    </table>

<br><br>

    <h2><center>Donation Table</center></h2>
    <table>
        <tr>
            
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Date of Donation</th>
            <th>Amount</th>
        </tr>
        <?php
        if ($donate_result->num_rows > 0) {
            while($row = $donate_result->fetch_assoc()) {
                echo "<tr><td>" . $row["name"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["email"] . "</td><td>" . $row["date"] ."</td><td>" . $row["amount"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No results</td></tr>";
        }
        ?>
    </table>


    
<br><br>

<h2><center>Registered Volunteers</center></h2>
<table>
    <tr>
        
        <th>Name</th>
        <th>DOB</th>
        <th>Address</th>
        <th>Occupation</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Dedication of time</th>
        <th>Minimum Duration of Commitment</th>
    </tr>
    <?php
    if ($volunteer_result->num_rows > 0) {
        while($row = $volunteer_result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["dob"] . "</td><td>" . $row["address"] . "</td><td>" . $row["occupation"] ."</td><td>" . $row["phone"] ."</td><td>". $row["email"] . "</td><td>".$row["time"] . "</td><td>".$row["duration"] ."</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No results</td></tr>";
    }
    ?>
</table>


    
<br><br>

<h2><center>Registered Adopters</center></h2>
<table>
    <tr>
        
        <th>Name</th>
        <th>DOB</th>
        <th>Address</th>
        <th>Occupation</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Pet</th>
        <th>Reason to adopt</th>
        <th>House Type</th>
        <th>First time adopting a pet?</th>
        <th>Will you be open to receiving counselling support from the RESCUE AND REHOME team? </th>
    </tr>
    <?php
    if ($adopt_result->num_rows > 0) {
        while($row = $adopt_result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["dob"] . "</td><td>" . $row["address"] . "</td><td>" . $row["occupation"] ."</td><td>" . $row["phone"] ."</td><td>". $row["email"] . "</td><td>".$row["pet"] . "</td><td>".$row["reason"] ."</td><td>".$row["houseType"]."</td><td>".$row["firstTime"] ."</td><td>".$row["support"]."</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No results</td></tr>";
    }
    ?>
</table>



    
    <!-- Sign-out Button -->
    <form action="index.html" method="post" style="text-align: right;">
        <button type="submit">Sign Out</button>
    </form>


    
</body>
</html>