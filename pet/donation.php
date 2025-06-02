<?php include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    

    
    

    $sql = "INSERT INTO donate (name,  phone, email, date, amount) VALUES ('$name', '$phone', '$email', '$date', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('Thank you, $name, for your donation of INR$amount.');
            window.location='userPage.php';
        </script>";
    } else {
        echo "Error: ". $sql. "<br>". $conn->error;
    }

    $conn->close();
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" 
          content="width=device-width,initial-scale=1.0" />
   <!-- <link rel="stylesheet" href="style.css" class="css" />-->
<style>


.container {
    height: 855px;
    width: 400px;
    background-color:#ceb180;
    /*background-color:#e5933f;*/
  /*  background-image: linear-gradient(#1e6b30, #308d46);*/
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
    position: absolute;
    border-bottom-left-radius: 150px;
    border-top-right-radius: 150px;
}

.main-content {
    height: 150px;
    background: color #fda s 0;
   /* background-color: #1b9236;  background-color:#eeaa5b;*/
   border-bottom-left-radius: 90px;
    border-bottom-right-radius: 80px;
    border-top: #1e6b30;
}


.centre-content {
    height: 180px;
    margin: -70px 30px 20px;
    color: aliceblue;
    text-align: center;
    font-size: 20px;
    border-radius: 25px;
    padding-top: 0.5px;
    background: rgb(0,0,0,0.5);

    /*
    background-image: linear-gradient(#1e6b30, #308d46);*/
}



.centre-content-h1 {
    padding-top: 30px;
    padding-bottom: 30px;
    font-weight: normal;
}


.price {
   
   font-size: 60px;
   margin-left: 5px;
   bottom: 15px;
   position: relative;
}



.card-details {
    background: rgb(0,0,0,0.5);
    color: rgb(225, 223, 233);
    margin: 10px 30px;
    padding: 10px;
}

.card-details p {
    font-size: 15px;
}

.card-details label {
    font-size: 15px;
    line-height: 35px;
}

.course {
    color: black;
    font-size: 25px;
    font-weight: bolder;
}






        .submit-now-btn,      
.cancel-now-btn {
    cursor: pointer;
    color: black;
    height: 30px;
    width: 240px;
    border: none;
    margin: 5px 30px;
    background-color:#ffe338;  
} 
.submit-now-btn:hover ,
.cancel-now-btn:hover {
            background-color: #f4bc1c; /* Change background color on hover */
            color: black; /* Change text color on hover */
        }

/* Modal styles */
.modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .error-message {
            color: red;
            display: none;
        }

</style>

</head>

<body>
<form id="donationForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
    <div class="container">
    <div class="main-content">
          
          </div>

        <div class="centre-content">
            <h1 class="price">DONATE NOW!</h1>
            
        </div>


        <div class="card-details">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required><br>
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"  placeholder="Enter your email id" required><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>
<!--
        <div class="date-number">
                <label> Date </label>
                <input type="text" 
                       class="date-number-field" 
                       placeholder="DD-MM-YYYY" minlength="10" maxlength="10"/>
                       <div class="error-message" id="expiry-date-error">Date must be exactly 10 characters.</div>
            </div>-->
            <p>    Donate using Credit or Debit card</p>

            <div class="card-number">
                <label> Card Number </label>
                <input type="text" 
                       class="card-number-field" 
                       placeholder="####-####-####" minlength="12" maxlength="12"/>
                       <div class="error-message" id="card-number-error">Card number must be exactly 12 digits.</div>
            </div>
            <br />

            <label for="expire">Expiry Date:</label>
            <input type="date" id="expiry-date" name="expire" required><br>

<!--
            <div class="date-number">
                <label> Expiry Date </label>
                <input type="text" 
                       class="date-number-field" 
                       placeholder="DD-MM-YYYY" minlength="10" maxlength="10"/>
                       <div class="error-message" id="expiry-date-error">Expiry date must be exactly 10 characters.</div>
            </div>
    -->

            <div class="cvv-number">
                <label> CVV number </label>
                <input type="text" 
                       class="cvv-number-field" 
                       placeholder="xxx" minlength="3" maxlength="3"required/>
                       <div class="error-message" id="cvv-error">CVV number must be exactly 3 digits.</div>
            </div>
            <div class="nameholder-number">
                <label> Card Holder name </label>
                <input type="text" 
                       class="card-name-field" 
                       placeholder="Enter your Name" required/>
            </div>
            <label for="amount">Donation Amount:</label>
        <input type="number" id="amount" name="amount" placeholder="Enter amount to donate" min="1" required><br>
        <div class="error-message" id="amount-error">Please enter a valid amount.</div>

            <button type="submit" class="submit-now-btn" name="donate"  >
                DONATE
            </button>
            <button type="button" class="cancel-now-btn" onclick="window.location.href='userPage.php'">
                CANCEL
            </button>
        </div>
    </div>
    <div id="thankYouModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p><center>Thank you for your donation!</center></p>
        </div>
    </div>

    </form>
    <script>
        function validateForm(event) {
            event.preventDefault();
            let isValid = true;
            document.getElementById('card-number-error').style.display = 'none';
            document.getElementById('expiry-date-error').style.display = 'none';
            document.getElementById('cvv-error').style.display = 'none';
            document.getElementById('amount-error').style.display = 'none';
            document.getElementById('date-error').style.display = 'none';

            const cardNumber = document.getElementById('card-number').value;
            const expiryDate = document.getElementById('expiry-date').value;
            const cvv = document.getElementById('cvv').value;
            const amount = document.getElementById('amount').value;
            const date = document.getElementById('date').value;

            if (cardNumber.length !== 12) {
                document.getElementById('card-number-error').style.display = 'block';
                isValid = false;
            }
            if (expiryDate.length !== 10) {
                document.getElementById('expiry-date-error').style.display = 'block';
                isValid = false;
            }
            if (cvv.length !== 3) {
                document.getElementById('cvv-error').style.display = 'block';
                isValid = false;
            }
            if (date.length !== 10) {
                document.getElementById('date-error').style.display = 'block';
                isValid = false;
            }
            if (amount < 1) {
                document.getElementById('amount-error').style.display = 'block';
                isValid = false;
            }

            if (isValid) {
                document.getElementById('thankYouModal').style.display = "block";
                setTimeout(() => {
                    document.getElementById('donationForm').submit();
                }, 2000);
            }
        }

        function closeModal() {
            document.getElementById('thankYouModal').style.display = "none";
        }


    </script>
</body>
</html>