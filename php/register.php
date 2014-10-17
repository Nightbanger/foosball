<?php
require("config.php");
if (!empty($_POST)) {
    // Ensure that the user fills out fields
    if (empty($_POST['username'])) {
        die("Please enter a username.");
    }
    if (empty($_POST['password'])) {
        die("Please enter a password.");
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        die("Invalid E-Mail Address");
    }


    $query = "SELECT username  FROM Users WHERE username = ?";


    if ($stmt = $mysqli->prepare($query)) {

        $stmt->bind_param('s', $_POST['username']);
        /* execute statement */
        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($username);

        /* fetch values */    /* fetch values */
        while ($stmt->fetch()) {
            die('Username exists');
        }

        /* close statement */
        $stmt->close();
    }


    // Security measures
    $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
    $password = hash('sha256', $_POST['password'] . $salt);
    for ($round = 0; $round < 65536; $round++) {
        $password = hash('sha256', $password . $salt);
    }


    $stmt = $mysqli->prepare("INSERT INTO users (username,password,salt,email) VALUES (?,?,?,?)");

    $stmt->bind_param('ssss', $un, $pw, $sa, $em);

    $un = $mysqli->real_escape_string($_POST['username']);
    $pw = $mysqli->real_escape_string($password);
    $sa = $mysqli->real_escape_string($salt);
    $em = $mysqli->real_escape_string($_POST['email']);

    /* execute prepared statement */
    $stmt->execute();

    printf("%d Row inserted.\n", $stmt->affected_rows);


    header("Location: ../index.html");
    die("Redirecting to index.php");
}
?>