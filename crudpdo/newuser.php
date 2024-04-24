<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newuser.css">
    <title>Add New User CRUD</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Add new user:</h2><br>
            <a class="backbtn" href="crudpdo.php">Back</a>
            
        </div><br><br>

        <form action="code.php" method="POST">
            <div>
                <label for="firstname">First Name:</label><br>
                <input class="textinput" type="text" name="firstname">
            </div><br>
            <div>
                <label for="lastname">Last Name:</label><br>
                <input class="textinput" type="text" name="lastname">
            </div><br>
            <div>
                <label for="email">Email:</label><br>
                <input class="textinput" type="text" name="email">
            </div><br>
            <button type="submit" class="savebtn" name="save_user">Save user</button>

        </form>
        

    </div>
    
</body>
</html>