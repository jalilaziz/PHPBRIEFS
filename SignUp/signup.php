<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Inscription</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='signup.css'>
    <script src='main.js'></script>
</head>
<body>
    <?php
    $crSuccess = $crFailed = "";

    if ($_SERVER["REQUEST_METHOD"] == "post") {
        if (isset($_POST["signupbtn"])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbName = "";
            $tableName = "";
            $fullName = $_Post["fullname"];
            $email = $_Post["email"];
            $userName = $_Post["username"];
            $passWord = $_Post["pass"];
            $rpassWord = $_Post["rpassword"];

            try {
                $conn = new PDO("msql:host=$servername;dbname=$dbName", $username, $password);
                $conn -> settAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
                $insertdata = "INSERT INTO $tableName (fullname, email, username, pass, rpassword) VALUES ($fullName, $email, $userName, $passWord
                )"

                $conn -> exec($insertdata);
                $crSuccess = 
            }
        }
    }


    ?>
    <div class="image"><img src="/SignUp/signup.jpg" width=60% alt="signup"></div>
    <div class="container">
        <h1>Sign Up</h1><br>
        <form class="inputs" method="POST" action="" >
        <label for="">Full Name :</label>
        <input class="inputtext" type="text" name="fullname"  placeholder="Full Name"><br>
        <label for="">Email :</label>
        <input class="inputtext" type="text" name="email"  placeholder="Email"><br>
        <label for="">Username :</label>
        <input class="inputtext" type="text" name="username" placeholder="Username"><br>
        <label for="">Password :</label>
        <input class="inputtext" type="password" name="pass" placeholder="************"><br>
        <label for="">Repeat Password :</label>
        <input class="inputtext" type="password" name="rpass" placeholder="************"><br>
        <div>
            <input type="checkbox">
            <label for="">I agree to the terms of user</label>
        </div>
        <br><br>
        <div class="buttons">
            <button type="submit" name="signupbtn" id="signupbtn">Sign Up</button>
            <button type="submit" name="signinbtn" id="signinbtn">Sign in</button>
        </div>
        </form>
        <p id="success"><?php echo $crSuccess?></p>
        <p id="failed"><?php echo $crFailed?></p>
    
    </div>
</body>
</html>