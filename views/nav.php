<?php
session_start();

$partial_navbar = '
<div class="ui inverted menu">
    <div class="ui container">
      <a href="'.$server_name.'" class="header item">
        Home
      </a>
      ';
        if(isset($_SESSION['userid']))
            {
            $partial_navbar .='
                <a class="item" href="'.$server_name.'/src/articles.php">My Articles</a></li>
                <a class="item" href="'.$server_name.'/src/add.php">Add new Article</a></li>
                
            ';
            }

            if(isset($_SESSION['username']))
            {
            $partial_navbar .= '
            <div class="right menu">
            <div class="ui simple dropdown item">'.
                $_SESSION['username'].'<i class="dropdown icon"></i>
                <div class="menu">
                        <a class="item" href="'.$server_name.'/src/logout.php">Sign out</a>
                    </div>
                </div>
            </div>';
            }
            else
            {
            $partial_navbar .= '
            <div class="right menu">
                <a class="item" href="'.$server_name.'/register.html">Sign up</a>
                <a class="item" href="'.$server_name.'/login.html">Sign in</a>
            </div>';
            }
        $partial_navbar .= '
      
    </div>
  </div>';
?>