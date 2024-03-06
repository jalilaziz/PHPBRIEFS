<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MySQL Get Last Inserted ID</title>
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

        #btn {
            float: right;
            font-size: 15px;
            background-color: #B6D7A8;
            border-radius: 12px;
            border: none;
            padding: 20px 24px;
        }

        #success {
            color: green;
            font-size: 20px;
        }

        #failed {
            color: red;
            /* font-size: 20px; */
        }
        .form {
            /* display: flex; */
            /* flex-direction: column; */
            font-size: 18px;
        }
        .inputtext {
            float: right;
            border-radius: 7px;
            font-size: 15px;
            border: 1px solid;
            padding: 5px;
            margin-left: 10px;
        }
        
    </style>
</head>

<body>
<?php 
$crSuccess = $crFailed = "";

function check($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST["submit"])){
        $firstname = check($_POST["firstname"]);
        $lastname = check($_POST["lastname"]);
        $city = check($_POST["city"]);
        $origine = check($_POST["origine"]);
        $email = check($_POST["email"]);
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbName = "solidatabase";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
            $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
            $crea = "INSERT INTO stagiaires (firstname, lastname, email, city, origine) VALUES ('$firstname', '$lastname', '$email', '$city', '$origine')";

            $conn->exec($crea);
            $last_id = $conn->lastInsertId();
            $crSuccess = "New record created successfully. Last inserted ID is: $last_id";
        }catch(PDOException $e){
            $crFailed = "Error inserting data. " . $e->getMessage();
        }
        $conn = null;
    }
}
?>
    <div class="container">
    <h1>PHP MySQL Get Last Inserted ID</h1>
    <form  method="POST" action="" >
    <label for="">Firstname :</label>
    <input class="inputtext" type="text" name="firstname" ><br><br>
    <label for="">Lastname :</label>
    <input class="inputtext" type="text" name="lastname" ><br><br>
    <label for="">City :</label>
    <input class="inputtext" type="text" name="city"><br><br>
    <label for="">Origine :</label>
    <input class="inputtext" type="text" name="origine" ><br><br>
    <label for="">Email :</label>
    <input class="inputtext" type="text" name="email"><br><br>
    
    <button type="submit" name="submit" id="btn" value="Create Table">Insert Data</button>
    </form>
    <p id="success"><?php echo $crSuccess?></p>
    <p id="failed"><?php echo $crFailed?></p>

</div>
</body>

</html>