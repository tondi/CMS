<?php 
        ini_set('display_errors', -1);
    include('config.php');

    include('views/head.php');
    include('views/nav.php');

    require('src/smarty/Smarty.class.php');

    $db = new mysqli($db_address, $db_username, $db_password, $db_name);
    if($db->connect_errno)
    {
        echo 'Error connecting to db';
        exit;
    }

    $statement = $db->prepare("SELECT articles.title AS title,
                                    articles.image AS image,
                                    articles.content AS content,
                                    articles.date AS date,
                                    articles.author_name AS author_name 
                                FROM articles
                                ORDER BY articles.date DESC");

    if (!$statement) {
        echo 'Error during equery execution';
        exit;
    }
    $statement->execute();
    $statement->bind_result($title, $image, $content, $date, $author_name);

    $view = new Smarty;
    $view->template_dir = 'templates/';
    $view->compile_dir = 'templates_c/';

    $view->assign('head', $partial_head);
    $view->assign('navbar', $partial_navbar);

    $articles = array();


    for($i = 0; $statement->fetch(); ++$i)
    {
        $articles[$i] = array(
            'title' => $title,
            'image' => $image,
            'content' => $content,
            'date' => $date,
            'author_name' => $author_name,
            'isRemovable' => 0
        );
    }

    $view->assign('articles', $articles);
    $view->display('articles.tpl');


    $statement->close();


?>