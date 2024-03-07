<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MySQL Prepared Statements</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            max-width: 600px;
            border-radius: 15px;
            border: 1px solid;
            box-shadow: 2px 2px 4px;
            padding: 20px;
        }

        #btn {
            font-size: 15px;
            background-color: #B6D7A8;
            border-radius: 12px;
            border: none;
            padding: 20px 60px;
        }

        #success {
            color: green;
            /* font-size: 20px; */
        }

        #failed {
            color: red;
        }
        .form1, .form2 {
            font-size: 18px;
            padding: 5px;
            width: 50%;
        }
        .inputtext {
            float: right;
            border-radius: 7px;
            font-size: 15px;
            border: 1px solid;
            padding: 5px;
            margin-left: 10px;
        }
        .forms {
            display: flex;
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

    if(isset($_POST["submit"])){
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbName = "solidatabase";
        $tableName = "stagiaires";

        $firstname1 = check($_POST["firstname1"]);
        $lastname1 = check($_POST["lastname1"]);
        $city1 = check($_POST["city1"]);
        $origine1 = check($_POST["origine1"]);
        $email1 = check($_POST["email1"]);

        $firstname2 = check($_POST["firstname2"]);
        $lastname2 = check($_POST["lastname2"]);
        $city2 = check($_POST["city2"]);
        $origine2 = check($_POST["origine2"]);
        $email2 = check($_POST["email2"]);

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
                $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $stmt1 = $conn->prepare("INSERT INTO $tableName (firstname, lastname, city, origine, email)
                VALUES (:firstname, :lastname, :city, :origine, :email)");
                $stmt1->bindParam(':firstname', $firstname1);
                $stmt1->bindParam(':lastname', $lastname1);
                $stmt1->bindParam(':city', $city1);
                $stmt1->bindParam(':origine', $origine1);
                $stmt1->bindParam(':email', $email1);
                $stmt1->execute();

                $stmt2 = $conn->prepare("INSERT INTO $tableName (firstname, lastname, city, origine, email)
                VALUES (:firstname, :lastname, :city, :origine, :email)");
                $stmt2->bindParam(':firstname', $firstname2);
                $stmt2->bindParam(':lastname', $lastname2);
                $stmt2->bindParam(':city', $city2);
                $stmt2->bindParam(':origine', $origine2);
                $stmt2->bindParam(':email', $email2);
                $stmt2->execute();

                $crSuccess = "New records inserted successfully.";
            }catch(PDOException $e){

                $crFailed = "Error inserting data. " . $e->getMessage();
            }       
    }
?>
<div class="container">
    <h1>PHP MySQL Prepared Statements</h1>
    <form method="POST" action="">
        <div class="forms">
            <div class="form1">
                <label>Firstname :</label>
                <input class="inputtext" type="text" placeholder="Firstname" name="firstname1" ><br><br>
                <label>Lastname :</label>
                <input class="inputtext" type="text" placeholder="Lastname" name="lastname1" ><br><br>
                <label>City :</label>
                <input class="inputtext" type="text" placeholder="City" name="city1"><br><br>
                <label>Origine :</label>
                <input class="inputtext" type="text" placeholder="Origine" name="origine1" ><br><br>
                <label>Email :</label>
                <input class="inputtext" type="text" placeholder="Email" name="email1">
            </div>
            <div class="form2">
                <label>Firstname :</label>
                <input class="inputtext" type="text" placeholder="Firstname" name="firstname2" ><br><br>
                <label>Lastname :</label>
                <input class="inputtext" type="text" placeholder="Lastname" name="lastname2" ><br><br>
                <label>City :</label>
                <input class="inputtext" type="text" placeholder="City" name="city2"><br><br>
                <label>Origine :</label>
                <input class="inputtext" type="text" placeholder="Origine" name="origine2" ><br><br>
                <label>Email :</label>
                <input class="inputtext" type="text" placeholder="Email" name="email2">
            </div>
        </div>
    <br>
    <div><button type="submit" name="submit" id="btn">Insert Prepared Statements</button></div>
    
    <p id="success"><?php echo $crSuccess?></p>
    <p id="failed"><?php echo $crFailed?></p>
    </form>
    
</div>
    
</body>

</html>