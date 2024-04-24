<?php
session_start();
include('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crudpdo.css">
    <title>CRUD</title>
</head>
<body>
    <div class="container">
        
        <?php if(isset($_SESSION['message'])) : ?>
            <h5 class="message"><?= $_SESSION['message']; ?></h5>
        <?php
            unset($_SESSION['message']);
            endif; 
        ?>

        <div class="card-head">
            <h2>List of users:</h2><br>
            <a class="newuser newbtn" href="newuser.php">New User</a>  
        </div>
        <div class="card-body">
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
                    $query = "SELECT * FROM stagiaires";
                    $statement = $conn->prepare($query);
                    $statement->execute();

                    $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                    $result = $statement->fetchAll(); 
                    if($result){
                        foreach($result as $row) {
                            ?>
                                <tr>
                                    <td><?=$row->id; //$row['id']; ?></td>
                                    <td><?=$row->firstname; //$row['firstname']; ?></td>
                                    <td><?=$row->lastname; //$row['lastname']; ?></td>
                                    <td><?=$row->email; //$row['email']; ?></td>
                                    <td><?=$row->regdate; //$row['regdate']; ?></td>
                                    <td>
                                    <a  class="edit aedit" href="edit.php?id=<?= $row->id; ?>">Edit</a>
                                    <a class="delete adelete" href="delete.php">Delete</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }else{
                        ?>
                            <tr>
                                <td colspan="5">No Record Found</td>
                            </tr>
                        <?php
                    }
                ?>
                <!-- <tr>
                    <td>0</td>
                    <td>jalil</td>
                    <td>aziz</td>
                    <td>jalil@aziz.com</td>
                    <td>2024-04-23 15:44:49</td>
                    <td>
                        <button class="edit"><a  class="aedit" href="edit.php">Edit</a></button>
                        <button class="delete"><a class="adelete" href="delete.php">Delete</a></button>
                    </td> -->
                </tr>
            </tbody>
        </table>

        </div>

    </div>
    
</body>
</html>