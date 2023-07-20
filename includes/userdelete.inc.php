<?php

//check if submit button is clicked. similar to if($_SERVER['REQUEST_METHOD'] == 'POST')
if (isset($_POST['submit'])) {
    //get the data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    //check if the fields are empty
    if (empty($username) || empty($password)) {
        header("Location: ../index.php?error=emptyfields&username=" . $username );
        exit();
    } else {
        //catch errors
        try {
        //require connection file to database
        require_once 'db.inc.php';

        //prepare the sql statement
        $query = "DELETE FROM users WHERE username = :username AND password= :password;";

        //prepare the sql statement for execution
        $stmt = $pdo->prepare($query);
        $stmt -> bindParam(':username', $username);
        $stmt -> bindParam(':password', $password);

        $stmt -> execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php?delete=success");
    

        } catch (PDOException $e) {
            die ("Error: " . $e->getMessage());
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}