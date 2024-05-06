<?php
session_start();
include('dbcon.php');

if(isset($_POST['delete_stagiaire'])){

    $stagiaire_id = $_POST['delete_stagiaire'];

    try {
        $query = "DELETE FROM stagiaires WHERE id=:stagiaire_id";
        $statement = $conn->prepare($query);
        $data = [
            ':stagiaire_id' => $stagiaire_id
        ]; 
        $query_execute = $statement->execute($data);

        if($query_execute) {
            $_SESSION['message'] = "Deleted Successfully.";
            header('Location: crudhome.php');
            exit(0);
        }
        else {
            $_SESSION['message'] = "Not Deleted. ";
            header('Location: crudhome.php');
            exit(0);
        }

    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['update_user'])) {
    $stagiaire_id = $_POST['stagiaire_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    try {
        $query = "UPDATE stagiaires SET firstname=:firstname, lastname=:lastname, email=:email WHERE id=:stagiaire_id LIMIT 1";
        $statement = $conn->prepare($query);

        $data = [
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':stagiaire_id' => $stagiaire_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute) {
            $_SESSION['message'] = "Updated Successfully.";
            header('Location: crudhome.php');
            exit(0);
        }
        else {
            $_SESSION['message'] = "Not Updated. ";
            header('Location: crudhome.php');
            exit(0);
        }

    }catch (PDOException $e) {
        echo $e->getMessage();
    }
}

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
        header('Location: crudhome.php');
        exit(0);
    }
    else {
        $_SESSION['message'] = "Not inserted";
        header('Location: crudhome.php');
        exit(0);
    }
}


?>