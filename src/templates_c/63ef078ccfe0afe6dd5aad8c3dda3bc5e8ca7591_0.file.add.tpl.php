<?php
/* Smarty version 3.1.30, created on 2017-11-08 20:51:47
  from "C:\xampp\htdocs\CMS\templates\add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a03605339f524_19150755',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63ef078ccfe0afe6dd5aad8c3dda3bc5e8ca7591' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CMS\\templates\\add.tpl',
      1 => 1510170697,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a03605339f524_19150755 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <?php echo $_smarty_tpl->tpl_vars['head']->value;?>

        <title>Articles</title>
    </head>
    <body>
        <?php echo $_smarty_tpl->tpl_vars['navbar']->value;?>

        <div class="ui raised very padded text container ">

                <form enctype="multipart/form-data" method="post" action="create.php" class="ui form">
                    <div class="field">
                        <label>Title: <input type="text" name="title" placeholder="Example title"/></label>
                    </div>
                    <div class="field">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <div class="field">
                    <textarea name="content"></textarea>
                    </div>
                    <button class="ui button" type="submit">Add article</button>
                    
                </form>
        </div>
    </body>
</html><?php }
}
