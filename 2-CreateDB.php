<?php
//PDO
$createSuccess = $createFailed = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["submit"])){
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "solidatabase";
        try {
            $conn = new PDO("mysql:host=$serverName", $userName, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $crea = "CREATE DATABASE $dbName ";
            $conn -> exec($crea);
            $createSuccess = "Database Created successfully with name $dbName";
        } catch(PDOException $e) {
            $createFailed = "Error creating database" . $e ->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Create a MySQL DATABASE</title>
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

        #connsuccess {
            color: green;
            /* font-size: 20px; */
        }

        #connfailed {
            color: green;
            /* font-size: 20px; */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>PHP Create a MySQL DATABASE</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <button class="submit" type="submit" name="submit">Create database</button>
            <p id="connsuccess">
                <?php echo $createSuccess?>
            </p>
            <p id="connfailed">
                <?php echo $createFailed?>
            </p>
        </form>
    </div>

</body>
</html>
