<?php
include('dbcon.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/newuser.css">
    <title>Edit User CRUD</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Edit User:</h2><br>
            <a class="backbtn" href="crudhome.php">Back</a> 
        </div><br><br>
        <?php
            if(isset($_GET['id'])){
                $stagiaire_id = $_GET['id'];

                $query = "SELECT * FROM stagiaires WHERE id=:stagiaire_id LIMIT 1";
                $statement = $conn->prepare($query);
                $data = [':stagiaire_id' => $stagiaire_id];
                $statement->execute($data);

                $result = $statement->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC/$result=['firstname'];
            }
        ?>
        <form action="code.php" method="POST">
            <input type="hidden" value="<?= $result->id; ?>" name="stagiaire_id" />
            <div>
                <label for="firstname">First Name:</label><br>
                <input type="text" class="textinput" value="<?= $result->firstname; ?>" name="firstname" />
            </div><br>
            <div>
                <label for="lastname">Last Name:</label><br>
                <input type="text" class="textinput" value="<?= $result->lastname; ?>" name="lastname" />
            </div><br>
            <div>
                <label for="email">Email:</label><br>
                <input type="text" class="textinput" value="<?= $result->email; ?>" name="email" />
            </div><br>
            <button type="submit" class="savebtn" name="update_user">Update user</button>

        </form>
        

    </div>
    
</body>
</html>