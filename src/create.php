<?php

ini_set('display_errors', -1);

include('../config.php');

session_start();


if(isset($_POST['title']) && isset($_POST['content']))
{
    $db = new mysqli($db_address, $db_username, $db_password, $db_name);
    if($db->connect_errno)
    {
        echo 'Error connecting to db';
        exit;
    }
   
      $target_dir = realpath(dirname(getcwd()))."/uploads/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }

      if (file_exists($target_file)) {
          $uploadOk = 1; //temp
      }

      if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }

      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }

      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
      
      } else {

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
          } else {
              echo "Sorry, there was an error uploading your file.";
          }
          
      }

      // Create entry in db
      
      
      $title = $_POST['title'];
      $content = $_POST['content'];


	echo "params:";
	echo $title;
	echo $content;

      if(!$statement = $db->prepare("INSERT INTO articles (title, image, content, author, author_name) VALUES ('".$title."', '".$target_file."', '".$content."', '".$_SESSION['userid']."', '".$_SESSION['username']."')"))
      {
          echo 'Could not create new article.'. $db->error;
          exit;
      } else {
        echo 'New article created';
          
        $statement->execute();
        header('Location: articles.php');

      }
}

?>