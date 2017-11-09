<?php

include('../config.php');

$db = new mysqli($db_address, $db_username, $db_password, $db_name);
if($db->connect_errno)
{
    echo 'Could not connect to db.';
    exit;
}

  // $statement->reset();
  // User does not exist, create new one
  if(isset($_POST['title']) ) {
    $title = $_POST['title'];

    $statement = $db->prepare("DELETE FROM articles WHERE title='".$title."'");

    if(!$statement)
    {
        echo 'Could not delete article.'. $db->error;
        exit;
    } else {
      echo 'article deleted';
        
      $statement->execute();
      header('Location: articles.php');

    }
  }

  

  // $statement->bind_param('ss', $_POST['username'], $hash);

?>