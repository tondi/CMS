<?php

session_start();

include('../config.php');

if(isset($_POST['username']) && isset($_POST['password']))
{
    $db = new mysqli($db_address, $db_username, $db_password, $db_name);
    if($db->connect_errno)
    {
        echo 'Error connecting to db';
        exit;
    }
    if(!$statement = $db->prepare("SELECT * FROM users WHERE name=?"))
    {
        echo 'Error during equery execution';
        exit;
    }

    $statement->bind_param('s', $_POST['username']);
    $statement->execute();

    echo $statement->num_rows;

    if($statement->num_rows > 0)
    {
        // User with this username already exists
        echo 'User exists';
        exit;
    }
    else
    {
        $statement->reset();
        // User does not exist, create new one
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Create entry in db
        if(!$statement = $db->prepare("INSERT INTO users (name, password) VALUES (?, ?)"))
        {
            echo 'Could not create new user.'. $db->error;
            exit;
        }

        $statement->bind_param('ss', $_POST['username'], $hash);
        $statement->execute();

        echo 'New user created';
        header('Location: ../index.php');
    }
}

?>