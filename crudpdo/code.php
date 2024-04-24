<?php
session_start();
include('dbcon.php');

if(isset($_POST['save_user'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $query = "INSERT INTO stagiaires (firstname, lastname, email) VALUES (:firstname, :lastname, :email)";
    $query_run = $conn->prepare($query);

    $data = [
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':email' => $email,
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute) {
        $_SESSION['message'] = "Inserted successfully";
        header('Location: crudpdo.php');
        exit(0);
    }
    else {
        $_SESSION['message'] = "Not inserted";
        header('Location: crudpdo.php');
        exit(0);
    }
}


?>