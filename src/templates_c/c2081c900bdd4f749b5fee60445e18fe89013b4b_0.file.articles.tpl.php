<?php
/* Smarty version 3.1.30, created on 2017-11-02 11:48:43
  from "C:\xampp\htdocs\CMS\templates\articles.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59faf80bb60129_12677247',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2081c900bdd4f749b5fee60445e18fe89013b4b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CMS\\templates\\articles.tpl',
      1 => 1509619005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59faf80bb60129_12677247 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <?php echo $_smarty_tpl->tpl_vars['head']->value;?>

        <title>Articles</title>
    </head>
    <body>
        <?php echo $_smarty_tpl->tpl_vars['navbar']->value;?>


        <div class="ui raised very padded text container ">
            <div class="ui items">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
        
                <div class="item">
                    <div class="image">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['value']->value["cover"];?>
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
                        <?php echo $_smarty_tpl->tpl_vars['value']->value["brief"];?>

                    </div>
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
