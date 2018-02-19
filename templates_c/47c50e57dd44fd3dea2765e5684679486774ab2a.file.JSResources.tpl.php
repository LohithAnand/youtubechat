<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-19 10:14:59
         compiled from "templates\JSResources.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213085a88c30cd83bc7-24497972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47c50e57dd44fd3dea2765e5684679486774ab2a' => 
    array (
      0 => 'templates\\JSResources.tpl',
      1 => 1519035107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213085a88c30cd83bc7-24497972',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a88c30cd863c7_20379534',
  'variables' => 
  array (
    'SCRIPTS' => 0,
    'SCRIPT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a88c30cd863c7_20379534')) {function content_5a88c30cd863c7_20379534($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript" src="layouts/basic/libs/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="layouts/basic/libs/jquery-ui/jquery-ui.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="layouts/basic/libs/popper/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="layouts/basic/libs/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="https://code.highcharts.com/highcharts.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://code.highcharts.com/highcharts-more.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://code.highcharts.com/modules/solid-gauge.js"><?php echo '</script'; ?>
>

<?php  $_smarty_tpl->tpl_vars['SCRIPT'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['SCRIPT']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SCRIPTS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['SCRIPT']->key => $_smarty_tpl->tpl_vars['SCRIPT']->value) {
$_smarty_tpl->tpl_vars['SCRIPT']->_loop = true;
?>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['SCRIPT']->value;?>
"><?php echo '</script'; ?>
>
<?php } ?>

<?php }} ?>
