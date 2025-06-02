
<?php include 'db_connection.php'; 




if(isset($_POST["signin"])){
    $username=$_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    
    

    $sql = "INSERT INTO logintable (username, name, password, email, phone) VALUES (?, ?, ?, ?, ?)";
    
   



    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameters to the statement
    $stmt->bind_param("sssss", $username, $name, $password, $email, $phone); // Corrected binding
    
    // Execute the statement
    if($stmt->execute()){
        echo("<script language='javascript'>
    window.alert('signed in succesfully')
    window.location.href='login.php'
    </script>");
     exit();
       
    }else{
        echo("<script language='javascript'>
    window.alert('you did not completed all required fields')
    window.location.href='signin.php'
    </script>");
    exit(); 
    }

    // Close the statement
    $stmt->close();
}  
?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>RESCUE AND REHOME</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
<style>
	



/* Made with love by Mutiullah Samim*/

@import url('https://fonts.googleapis.com/css?family=Numans');


html, body {
    height: 100%;
    font-family: 'Numans', sans-serif;
    position: relative;
}

body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('../pet/img/dogCatwallpaper5.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    filter: blur(3px); /* Apply blur effect to the background image */
    z-index: -1; /* Ensure the background stays behind other content */
}



.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;

}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
position:relative;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}










.container {
    height: 95%;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1; /* Ensure the container stays above the blurred background */
}


.card{
height: 500px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}
.error-message {
            color: red;
            font-size: 11px;
			
        }

</style>
</head>
<body>
    
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3><center>Add an account</center></h3>
				
                
			</div>
			<div class="card-body">
				<form action="" method="post" autocomplete="off">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control" placeholder="Enter username" required>
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="name" class="form-control" placeholder="Enter name" required>
						
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
						
					</div>
					<div id="password-error" class="error-message"></div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm password" required onkeyup="checkPassword()">
						
					</div>
					<div id="confirm-password-error" class="error-message"></div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="Enter email id" required>
					</div>

					<div class="input-group form-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-phone"></i></span>
        </div>
        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter mobile number" name="mobile" required>
    </div>

					<!--<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>  
					<div class="form-group">
						<input type="submit" value="Login" class="btn login_btn">
					</div>
                -->
                <div class="form-group">
                    <div class="row">
                        <div class="col text-center"> <!-- Add text-center class here -->
                            <input type="submit" name="signin" value="Signin" class="btn login_btn">
							
                        </div>
                    </div>
                </div>
				</form>
			</div>
			
		</div>
	</div>
</div>


<script>
        document.getElementById("phone").addEventListener("input", function(event) {
            const input = event.target;
            if (input.value.length > 10) {
                input.value = input.value.slice(0, 10);
            }
        });

        function checkPassword() {
            var password = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;
            var confirm_password_error = document.getElementById('confirm-password-error');
            
            if (password !== confirm_password) {
                confirm_password_error.textContent = "Passwords do not match";
            } else {
                confirm_password_error.textContent = "";
            }
        }

        document.getElementById("password").addEventListener("input", function(event) {
            const password = event.target.value;
            const passwordError = document.getElementById("password-error");
            const hasUpperCase = /[A-Z]/.test(password); // Check for at least one uppercase letter
            const hasLowerCase = /[a-z]/.test(password); // Check for at least one lowercase letter
            const hasNumber = /\d/.test(password); // Check for at least one number
            const hasSpecialChar = /[^\w\s]/.test(password); // Check for at least one special character
            
            let errorMessage = "";

            if (password.length < 8) {
                errorMessage += "Password must be at least 8 characters long. ";
            }
            if (!hasUpperCase || !hasLowerCase || !hasNumber || !hasSpecialChar) {
                errorMessage += "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
            }
            
            passwordError.textContent = errorMessage.trim(); // Remove leading/trailing whitespace
        });

        document.getElementById("signin-form").addEventListener("submit", function(event) {
            var password = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;
            var confirm_password_error = document.getElementById('confirm-password-error');
            
            if (password !== confirm_password) {
                confirm_password_error.textContent = "Passwords do not match";
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>


</body>
</html>