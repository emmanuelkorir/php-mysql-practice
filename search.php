<?php
//check if submit button is clicked. similar to if($_SERVER['REQUEST_METHOD'] == 'POST')
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //get the data from the form
        $usersearch = $_POST['usersearch'];

        //catch errors
        try {
        //require connection file to database
        require_once 'includes/db.inc.php';

        //prepare the sql statement
        $query = "SELECT * FROM comments WHERE username = :usersearch;";

        //prepare the sql statement for execution
        $stmt = $pdo->prepare($query);
        $stmt -> bindParam(':usersearch', $usersearch);

        $stmt -> execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

        } catch (PDOException $e) {
            die ("Error: " . $e->getMessage());
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h3>Search results</h3>

    <?php
    if (empty($result)) {
        echo "<div>";
        echo "<p>There were no results!</p>";
        echo "</div>";
    } else {
       // var_dump($result); check if successful
       // grab array and display
       foreach ($result as $row) {
           echo "<div>";
           echo "<p>";
           echo "<h3>" .htmlspecialchars($row['username']) . "</h3>";
           echo "</p>";
           echo "<p>";
           echo htmlspecialchars($row['comments']);
           echo "</p>";
           echo "<p>Created on: ";
           echo htmlspecialchars($row['createdon']);
           echo "</div>";
       }
    }
    ?>

</body>
</html>