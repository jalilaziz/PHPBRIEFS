<?php
//PDO
$connectSuccess = $connectFailed = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["submit"])){
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "solidatabase";
        try {
            $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connectSuccess = "Connected successfully";
        } catch(PDOException $e) {
            $connectFailed = "Connection failed" . $e ->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Connect to MySQL DATABASE</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            max-width: 550px;
            border-radius: 15px;
            border: 1px solid;
            box-shadow: 2px 2px 4px;
            padding: 20px;
        }
        .submit {
            font-size: 15px;
            background-color: #B6D7A8;
            border-radius: 12px;
            border: none;
            padding: 20px 24px;
        }
        #success {
            color: green;
        }
        #failed {
            color: green;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>PHP Connect to MySQL DATABASE</h1>
        <form class="formsubmit" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <button class="submit" type="submit" name="submit">Connect to database</button>
            <p id="success">
                <?php echo $connectSuccess?>
            </p>
            <p id="failed">
                <?php echo $connectFailed?>
            </p>
        </form>
    </div>

</body>
</html>
