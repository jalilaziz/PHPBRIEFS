<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>CRUD</title>
</head>
<body>
    <div class="container">
        <h2>List of users:</h2><br>
        <button class="newbtn"><a class="newuser" href="newuser.php">New User</a></button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Reg Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "crud1";

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo "Connected successfully";
                  } catch(PDOException $e) {
                    die "Connection failed: " . $e->getMessage();
                  }
                    $stmt = $conn->prepare("SELECT id, firstname, lastname, email, regdate FROM users");
                    $stmt->execute();

                ?>
                <tr>
                    <td>0</td>
                    <td>jalil</td>
                    <td>aziz</td>
                    <td>jalil@aziz.com</td>
                    <td>2024-04-23 15:44:49</td>
                    <td>
                        <button class="edit"><a  class="aedit" href="edit.php">Edit</a></button>
                        <button class="delete"><a class="adelete" href="delete.php">Delete</a></button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
    
</body>
</html>