<?php include 'db_connection.php'; 

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT *FROM loginTable WHERE username='$username' AND password='$password'";

    $result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	if ($username === 'admin' && $password === '@Admin123') {
		$_SESSION['log']="yes";
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    echo("<script language='javascript'>
    window.alert('logged in successfully')
    window.location.href='adminPage.php'
    </script>");
    exit();
	}else{
	$_SESSION['log']="yes";
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    echo("<script language='javascript'>
    window.alert('logged in successfully')
    window.location.href='userPage.php'
    </script>");
    exit();
   }

}else{
    echo("<script language='javascript'>
    window.alert('Wrong username and password')
    window.location.href='login.php'
    </script>");
    exit();
}

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

@import url('https://fonts.googleapis.com/css?family=Numans');


.container{
height: 100%;
align-content: center;
}

.card{
height: 340px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

body::before {
		
		content: '';
		position: absolute;
		top:0;                /*top: -50;*/
		background-attachment: fixed;
		left: 0;
		width: 100%;
		height: 100vh;
		background-image: url('../pet/img/dogCatwallpaper5.jpg');
		background-size: cover;
		background-repeat: no-repeat;
		background-position: top center;
		filter: blur(3px); /* Apply blur effect to the background image */
		z-index: -1; /* Ensure the background stays behind other content */
		
	}

html, body {
    height: 100%;
    font-family: 'Numans', sans-serif;
    position: relative;
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

	</style>

</head>
<body>
    
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3><center>Login</center></h3>
				
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" id="username" class="form-control" placeholder="username" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" id="password" class="form-control" placeholder="password" required>
					</div>
					
                <div class="form-group">
                    <div class="row">
                        <div class="col text-center"> <!-- Add text-center class here -->
                            <input type="submit" value="Login" class="btn login_btn">
                        </div>
                    </div>
                </div>
				</form>
			</div>
			<div class="card-footer">
                <div class="d-flex justify-content-center links" style="margin-bottom: 50px;"> <!-- Add inline style for margin -->
                    Don't have an account?<a href="signin.php">Sign Up</a>
                </div>
			</div>
		</div>
	</div>
</div>

</body>
</html>