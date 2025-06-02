<?php include 'db_connection.php'; 


?>

<!DOCTYPE html>
<html>
<head>
    <title>Volunteer Registration Form</title>

    <!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->

	



<style>

/* Made with love by Mutiullah Samim*/

@import url('https://fonts.googleapis.com/css?family=Numans');



body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 250%;
    background-color: #FFF380;
    
    background-size: cover;
    background-repeat: no-repeat;
    filter: blur(3px); /* Apply blur effect to the background image */
    z-index: -1; /* Ensure the background stays behind other content */
}


form {
    text-align: center;
}

form input[type="text"],
form input[type="date"],
form input[type="tel"],
form input[type="email"],
form textarea {
    width: 100%;
    margin: 10px 0;
    padding: 10px;
    box-sizing: border-box;
}

form label,
form input[type="text"],
form input[type="date"],
form input[type="tel"],
form input[type="email"],
form textarea,
form input[type="radio"] {
    font-size: 18px; /* Increase font size */
}



form input[type="radio"] {
    margin-right: 10px;
}




.container{
height: 100%;
width:auto;
align-content: center;
display:flex;


    justify-content: center;
    align-items: center;
}

.card{
height: 1790px;
margin-top: auto;
margin-bottom: auto;
width: 450px;
background-color: rgba(0,0,0,0.5) !important;
}


.card-header h3{
color: white;


}

html, body {
    height: 100%;
    font-family: 'Numans', sans-serif;
    position: relative;
}



.radio-group {
    text-align: left;
}

.submit_btn{
color: black;
background-color: #FFC312;
width: 150px;
position:relative;
}

.submit_btn:hover{
color: black;
background-color: white;
}


 </style>

</head>
<body>

<div class="container">

<div class="card"><br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="width: 400px; margin: 0 auto;">
    <div class="card-header">
        <h2 style="text-align: center;">Volunteer Registration Form</h2>
        </div><br><br>

        <label for="name">Full Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" required><br><br>
        <label for="address">Address:</label><br>
        <textarea id="address" name="address" required></textarea><br><br>
        <label for="occupation">Occupation:</label><br>
        <input type="text" id="occupation" name="occupation" required><br><br>

        <label for="phone">Phone Number:</label><br>
        <input type="tel" id="phone" name="phone" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>




        <div class="radio-group">
        <label for="time">How much time can you dedicate?
        </label><br>
        <input type="radio" id="weekends" name="time" value="Weekends Only">
        Weekends Only<br>
        <input type="radio" id="twoFour" name="time" value="2-4 hours per week">
        2-4 hours per week<br>
        <input type="radio" id="fiveEight" name="time" value="5-8 hours per week">
        5-8 hours per week<br>
        <input type="radio" id="eight" name="time" value="More then 8 hours per week">
        More then 8 hours per week<br><br>
        </div><br>
        


        <div class="radio-group">
        <label for="duration"> What is the minimum duration you can commit?</label><br>
        <input type="radio" id="one" name="duration" value="One month">
        One month<br>
        <input type="radio" id="three" name="duration" value="Three months">
        Three months<br>
        <input type="radio" id="six" name="duration" value="Six months">
        Six months<br><br>

        </div><br>







       
        <input type="submit" value="Register" class="btn submit_btn">
    </form>

</div>

    </div>

    <script>
        document.getElementById("phone").addEventListener("input", function(event) {
            const input = event.target;
            if (input.value.length > 10) {
                input.value = input.value.slice(0, 10);
            }
        });

        function validateForm() {
	        // Validate phone number

	        // Validate date of birth
	        var dob = new Date(document.getElementById("dob").value);
	        var today = new Date();
	        today.setHours(0, 0, 0, 0);
	        if (dob >= today) {
	            window.alert("Date of birth must be before today.");
	            return false;
	        }

        return true;
    }
</script>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $occupation = $_POST['occupation'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $time = $_POST['time'];
    $duration = $_POST['duration'];
   
    

    
    

    $sql = "INSERT INTO volunteer (name, dob, address, occupation, phone, email, time, duration) VALUES ('$name', '$dob', 
    '$address','$occupation', '$phone', '$email','$time', '$duration', )";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('Your Registration Has Been Successfully Submitted. Wait For a Few Days For Our Call');
            window.location='userPage.php';
        </script>";
    } else {
        echo "Error: ". $sql. "<br>". $conn->error;
    }

    $conn->close();
}
?>