<?php

include('../config.php');

require('./smarty/Smarty.class.php');

include('../config.php');
include('../views/head.php');
include('../views/nav.php');

$db = new mysqli($db_address, $db_username, $db_password, $db_name);
if ($db->connect_errno) {
    echo 'Could not connect to db.';
    exit;
}

// $statement->reset();
// User does not exist, create new one
if (isset($_POST['id'])) {
    $id        = $_POST['id'];
    $statement = $db->prepare("SELECT 
                            articles.id AS id,
                            articles.title AS title,
                            articles.image AS image,
                            articles.content AS content,
                            articles.date AS date,
                            articles.author_name AS author_name
                    FROM articles
                    WHERE articles.id='" . $id . "'");
    
    if (!$statement) {
        echo 'Could not edit article.' . $db->error;
        exit;
    } else {
        
        $statement->execute();
        $statement->bind_result($id, $title, $image, $content, $date, $author_name);
        
        
        
        $articles = array();
        
        for ($i = 0; $statement->fetch(); ++$i) {
            $articles[$i] = array(
                'id' => $id,
                'title' => $title,
                'image' => $image,
                'content' => $content,
                'date' => $date,
                'author_name' => $author_name,
                'isRemovable' => 1
            );
        }
        
        //   $articles[0]
        
        //   echo $articles[0]['id'];
        
        $view               = new Smarty;
        $view->template_dir = '../templates/';
        $view->compile_dir  = '../templates_c/';
        
        $view->assign('head', $partial_head);
        $view->assign('navbar', $partial_navbar);
        
        $view->assign('article', $articles[0]);
        $view->display('edit.tpl');
        
        $statement->close();
        
        //$statement->execute();
        
        
        
        
    }
    
}


if (isset($_POST['id2'])) {
    $id = $_POST['id2'];
    
    
    if (!isset($_FILES['fileToUpload']) || $_FILES['fileToUpload']['error'] == UPLOAD_ERR_NO_FILE) {
        $target_file = $_POST['prevImage'];
        echo $target_file;
    } else {
        
        
        print_r($_FILES);
        $target_dir    = realpath(dirname(getcwd())) . "/uploads/";
        $target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk      = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        
        if (file_exists($target_file)) {
            $uploadOk = 1;
        }
        
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            
        } else {
            
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            
        }
        
    }
    //   echo is_uploaded_file($_FILES['fileToUpload']);
    
    // Create entry in db
    
    $title   = $_POST['title'];
    $content = $_POST['content'];
    
    //   echo "UPDATE articles SET
    //             title = '".$title."',
    //             image = '".$target_file."',
    //             content = '".$title."'
    //     WHERE id=".$id;
    
    
    
    $statement2 = $db->prepare("UPDATE articles SET
                title = '" . $title . "',
                image = '" . $target_file . "',
                content = '" . $content . "'
        WHERE id=" . $id);
    
    if (!$statement2) {
        echo 'Could not edit article.' . $db->error;
        exit;
    } else {
        
        $statement2->execute();
        $statement2->close();
        header('Location: ../index.php');
        
    }
}
// $statement->bind_param('ss', $_POST['username'], $hash);

?>