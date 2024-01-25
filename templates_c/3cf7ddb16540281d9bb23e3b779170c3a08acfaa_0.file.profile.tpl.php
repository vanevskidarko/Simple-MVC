<?php
/* Smarty version 4.3.4, created on 2024-01-25 23:48:06
  from 'C:\php8.2\htdocs\PHPMVC\views\user\profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
  'version' => '4.3.4',
  'unifunc' => 'content_65b2e526a80f45_92250560',
  'has_nocache_code' => false,
  'file_dependency' =>
  array(
    '3cf7ddb16540281d9bb23e3b779170c3a08acfaa' =>
    array(
      0 => 'C:\\php8.2\\htdocs\\PHPMVC\\views\\user\\profile.tpl',
      1 => 1706222882,
      2 => 'file',
    ),
  ),
  'includes' =>
  array(),
), false)) {
  function content_65b2e526a80f45_92250560(Smarty_Internal_Template $_smarty_tpl)
  {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value; ?>
      </title>
    </head>

    <body>
      <h1>User Profile</h1>
      <p>User ID: <?php echo $_smarty_tpl->tpl_vars['user']->value['id']; ?>
      </p>
      <p>User Name: <?php echo $_smarty_tpl->tpl_vars['user']->value['username']; ?>
      </p>
    </body>

    </html><?php }
        }
