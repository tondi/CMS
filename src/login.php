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
    
    $statement = $db->prepare("SELECT id, name, password FROM users WHERE name=?");

    if(!$statement){
        echo 'Error during equery execution';
        exit;
    }

    $statement->bind_param('s', $_POST['username']);
    $statement->execute();
    $statement->bind_result($id, $username, $password);

    if($statement->fetch())
    {
        // User found, check password
	echo password_verify($_POST['password'], $password);
        if(password_verify($_POST['password'], $password))
        {
            // Password correct
            session_unset();
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $id;
            echo $_SESSION['userid'];
        }
        else
        {
            // Wrong password
            echo 'Wrong password.';
            exit;
        }

    }
    else
    {
        // User not found
        echo 'User '. $_POST['username']. ' does not exist.';
        exit;
    }

    // Get user from db and check password
    header('Location: ../index.php');

}

?>