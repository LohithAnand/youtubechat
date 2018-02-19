<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-19 01:37:31
         compiled from "templates\Header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:261285a88c30ccc4b29-64986109%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b53e3470b32ce33b0d1bde3b8c6dd4dc6a503b4' => 
    array (
      0 => 'templates\\Header.tpl',
      1 => 1519003558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '261285a88c30ccc4b29-64986109',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a88c30cd2ebf6_88734112',
  'variables' => 
  array (
    'APP_TITLE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a88c30cd2ebf6_88734112')) {function content_5a88c30cd2ebf6_88734112($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php echo $_smarty_tpl->getSubTemplate ('CSSResources.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <title> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['APP_TITLE']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
 </title>
    </head>
    <body>
        <!-- Image and text -->
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <i class="fab fa-youtube-square d-inline-block align-top" style="font-size: 31px;"></i>
                YouTubeChat
            </a>
            <a href="index.php?view=Logout">Logout</a>
        </nav>
    <?php }} ?>
