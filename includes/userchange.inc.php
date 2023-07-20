<?php

//check if submit button is clicked. similar to if($_SERVER['REQUEST_METHOD'] == 'POST')
if (isset($_POST['submit'])) {
    //get the data from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //check if the fields are empty
    if (empty($username) || empty($email) || empty($password)) {
        header("Location: ../index.php?error=emptyfields&username=" . $username . "&email=" . $email);
        exit();
    } else {
        //catch errors
        try {
        //require connection file to database
        require_once 'db.inc.php';

        //update the sql statement
        $query = "UPDATE users SET username = :username, email = :email, password = :password  WHERE id = 2;";

        //prepare the sql statement for execution
        $stmt = $pdo->prepare($query);
        $stmt -> bindParam(':username', $username);
        $stmt -> bindParam(':email', $email);
        $stmt -> bindParam(':password', $password);

        $stmt -> execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php?update=success");
    

        } catch (PDOException $e) {
            die ("Error: " . $e->getMessage());
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}