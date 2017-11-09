<?php

require('./smarty/Smarty.class.php');

include('../config.php');
include('../views/head.php');
include('../views/nav.php');

$db = new mysqli($db_address, $db_username, $db_password, $db_name);
if($db->connect_errno)
{
    echo 'Error connecting to db';
    exit;
}
            

// Set some variables asociated with loading page

$statement = $db -> prepare("SELECT articles.id AS id,
                                    articles.title AS title,
                                    articles.image AS image,
                                    articles.content AS content,
                                    articles.date AS date,
                                    articles.author_name AS author_name
                            FROM articles
                            WHERE articles.author='".$_SESSION['userid']."'ORDER BY articles.date DESC");
                                    
if(!$statement){
    echo 'Error during equery execution';
    exit;
}

$statement->execute();
$statement->bind_result($id, $title, $image, $content, $date, $author_name);

$articles = array();

for($i = 0; $statement->fetch(); ++$i)
{
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

$view = new Smarty;
$view->template_dir = '../templates/';
$view->compile_dir = '../templates_c/';

$view->assign('head', $partial_head);
$view->assign('navbar', $partial_navbar);

$view->assign('articles', $articles);
$view->display('articles.tpl');

$statement->close();

?>
