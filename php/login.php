<?php
require("config.php");

if (!empty($_POST)) 
    {
        // Ensure that the user fills out fields
        if (empty($_POST['username'])) {
            die("Please enter a username.");
        }
        else if (empty($_POST['password'])) {
            die("Please enter a password.");
        }

        $query = "SELECT 1 FROM users WHERE USERNAME = :username";

        $query_params = array(':username' => $_POST['username'] );
        try 
        {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }


        catch (PDOException $ex) 
        {
            die("Failed to run query: " . $ex->getMessage());
        }

        while($row = mysqli_fetch_array($result)) {
            echo $row['username'] . " " . $row['password']. " " . $row['salt'];
            echo "<br>";
        }


        $row = $stmt->fetch();
        if ($row) {
            echo("WOHOO");
        }
        else
        {
            die("Unlucky huh?");
        }
    
    }
?>