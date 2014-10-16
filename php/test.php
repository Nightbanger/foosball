<?php

require("config.php");

$stmt = $mysqli->prepare("INSERT INTO users (username,password,email) VALUES (?,?,?)"); //Values (j2o3, jioisd, 'Email*)<--'
$stmt->bind_param('sss', $un, $pw, $em);   // bind $sample to the parameter

// escape the POST data for added protection


$un = $mysqli->real_escape_string($_POST['username']);
$pw = $mysqli->real_escape_string($_POST['password']);
$em = $mysqli->real_escape_string($_POST['email']);

/* execute prepared statement */
$stmt->execute();

printf("%d Row inserted.\n", $stmt->affected_rows);


$query = "SELECT username, password FROM Users";

if ($stmt = $mysqli->prepare($query)) {

    /* execute statement */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($username, $password);

    /* fetch values */
    while ($stmt->fetch()) {
        printf("%s (%s)\n", $username, $password);
    }

    /* close statement */
    $stmt->close();
}

/* close connection */
$mysqli->close();
?>