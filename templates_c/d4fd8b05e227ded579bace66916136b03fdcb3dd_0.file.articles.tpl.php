<?php
/* Smarty version 3.1.30, created on 2017-11-08 20:45:34
  from "C:\xampp\htdocs\CMS\templates\articles.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a035edef193d0_50099545',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4fd8b05e227ded579bace66916136b03fdcb3dd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CMS\\templates\\articles.tpl',
      1 => 1510170334,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a035edef193d0_50099545 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <?php echo $_smarty_tpl->tpl_vars['head']->value;?>

        <title>Articles</title>
    </head>
    <body>
        <?php echo $_smarty_tpl->tpl_vars['navbar']->value;?>


        <div class="ui raised very padded text container ">
            <?php if (isset($_smarty_tpl->tpl_vars['articles']->value[0]) && $_smarty_tpl->tpl_vars['articles']->value[0]["isRemovable"] == 1) {?>
                <h1 class="ui header center aligned">Your Articles</h1>
                <?php } elseif (isset($_smarty_tpl->tpl_vars['articles']->value[0])) {?>
                <h1 class="ui header center aligned">All articles</h1>
                <?php } else { ?>
                <h1 class="ui header center aligned">No articles</h1>                
            <?php }?>
            <div class="ui items">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
        
                <div class="item">
                    <div class="image">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['value']->value["image"];?>
" alt="zdj">
                    </div>
                    <div class="content">
                    <a class="header"><?php echo $_smarty_tpl->tpl_vars['value']->value["title"];?>
</a>
                    <div class="meta">
                        <span><?php echo $_smarty_tpl->tpl_vars['value']->value["author_name"];?>
</span>
                    </div>
                    <div class="description">
                        <p> <?php echo $_smarty_tpl->tpl_vars['value']->value["date"];?>
</p>
                    </div>
                    <div class="extra">
                        <?php echo $_smarty_tpl->tpl_vars['value']->value["content"];?>

                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['value']->value["isRemovable"] == 1) {?>
                        <form method="post" action="remove.php" style="display: inline-block">
                            <input style="display:none" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
" type="text" name="title"/>
                            <input type="submit" class="ui button" value="Remove">
                        </form>
                        <form method="post" action="edit.php" style="display: inline-block">
                            <input style="display:none" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" type="text" name="id"/>
                            <input type="submit" class="ui button" value="Edit">
                        </form>
                    <?php }?>
                    </div>
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            
        </div>

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
