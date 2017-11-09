<?php
/* Smarty version 3.1.30, created on 2017-11-08 20:12:11
  from "C:\xampp\htdocs\CMS\templates\edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a03570bf3d880_34197389',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e9f0d8e13ee93e83ff1fb9e840356af6ee95c6f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CMS\\templates\\edit.tpl',
      1 => 1510168192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a03570bf3d880_34197389 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <?php echo $_smarty_tpl->tpl_vars['head']->value;?>

        <title>Articles</title>
    </head>
    <body>

        <?php echo $_smarty_tpl->tpl_vars['navbar']->value;?>

        <div class="ui raised very padded text container ">

                <form enctype="multipart/form-data" method="post" action="edit.php" class="ui form">
                    <div class="field">
                        <label>Title: <input type="text" name="title" placeholder="Example title"/ value="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
"></label>
                    </div>
                    <div class="image">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['article']->value["image"];?>
" alt="zdj">
                    </div>
                    <div class="field">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <div class="field">
                    <textarea name="content"><?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
</textarea>
                    </div>
                    <input style="display:none" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['image'];?>
" type="text" name="prevImage"/>
                    
                    <input style="display:none" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" type="text" name="id2"/>

                    <button class="ui button" type="submit">Update article</button>
                    
                </form>

        </div>

        <?php echo '<script'; ?>
>
            var imgs = document.querySelectorAll("img");
            console.log(imgs);
            for(let value of imgs) {
                var index = value.src.search("uploads");
                console.log(index);
                var arr = value.src.split("").slice(index,);
                arr.unshift("/CMS/");
                value.src = arr.join("");
            
                console.log(value.src)
                if(value.src=="http://localhost/CMS/uploads/") {
                    value.remove();
                }
                delete value;
            }
        <?php echo '</script'; ?>
>
    </body>
</html><?php }
}
