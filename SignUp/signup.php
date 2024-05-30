<?php
require_once 'signup_query.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='images/signup.css'>
    <title>SignUp3</title>
</head>

<body>

    <div class="image"><img src="signup.jpg" width=60% alt="signup"></div>
    <div class="container">
        <h1>Sign Up</h1><br>

        <p id="success" style="color:green;"> <?php echo $crSuccess?> </p>
        <p id="failed" style="color:red;"> <?php echo $crFailed?> </p>
        <p id="emptyfields" style="color:red;"> <?php echo $emptyFields?> </p>

        <form class="inputs" method="POST" action="">
            <label for="">Full Name :</label>
            <input class="inputtext" type="text" name="fullname" placeholder="Full Name"><br>

            <label for="">Email :</label>
            <input class="inputtext" type="text" name="email" placeholder="Email"><br>
            <p id="failed" style="color:red;"> <?php echo $errorEmail?> <?php echo $emailExist?></p>
            <p id="failed" style="color:red;"> </p>

            <label for="">Username :</label>
            <input class="inputtext" type="text" name="username" placeholder="Username"><br>
            <p id="failed" style="color:red;"> <?php //echo $errorUsername?> </p>

            <label for="">Password :</label>
            <input class="inputtext" type="password" name="password" placeholder="************"><br>
            <p id="failed" style="color:red;"> <?php //echo $errorPassword?> </p>

            <label for="">Repeat Password :</label>
            <input class="inputtext" type="password" name="repeat_password" placeholder="************"><br>
            <p id="failed" style="color:red;"> <?php //echo $errorRepeat?> </p>

            <div>
                <input type="checkbox" required>
                <label for="">I agree to the terms of user</label>
            </div>
            <br><br>
            <div class="buttons">
                <button type="submit" name="signup" id="signupbtn">Sign Up</button>
                <button type="submit" name="signin" id="signinbtn"><a href="signin.php">Sign in</a></button>
            </div>
        </form>

    </div>
</body>

</html>