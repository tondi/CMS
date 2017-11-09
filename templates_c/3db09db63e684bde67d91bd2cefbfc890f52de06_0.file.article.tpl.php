<?php
/* Smarty version 3.1.30, created on 2017-09-13 17:47:58
  from "E:\xampp\htdocs\templates\article.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59b9532e435d42_76572767',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3db09db63e684bde67d91bd2cefbfc890f52de06' => 
    array (
      0 => 'E:\\xampp\\htdocs\\templates\\article.tpl',
      1 => 1505317675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59b9532e435d42_76572767 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <?php echo $_smarty_tpl->tpl_vars['head']->value;?>

        <title>Articles - <?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</title>
    </head>
    <body>
        <?php echo $_smarty_tpl->tpl_vars['navbar']->value;?>


        <div class="container">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</h3>
                    </div>
                    <div class="panel-heading text-center">
                        Published by <strong><?php echo $_smarty_tpl->tpl_vars['article']->value['author'];?>
</strong> on <strong><?php echo $_smarty_tpl->tpl_vars['article']->value['date'];?>
</strong>
                    </div>
                    <div class="panel-body">
                        <?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        Recent articles
                    </div>
                    <div class="panel-body">
                        Tutaj bedo linki do ostatnich artykulow
                    </div>
                </div>
            </div>
        </div>
    </body>
</html><?php }
}
