<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-19 08:21:21
         compiled from "templates\Home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:237045a8885a15813d3-61843969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66fc53d654040142e94c8083fa44da1cbd7de06a' => 
    array (
      0 => 'templates\\Home.tpl',
      1 => 1519027232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '237045a8885a15813d3-61843969',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a8885a1683409_43361255',
  'variables' => 
  array (
    'BROADCAST_ITEMS' => 0,
    'BROADCAST_ITEM' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8885a1683409_43361255')) {function content_5a8885a1683409_43361255($_smarty_tpl) {?><div class="container">
    <div class="row">
        <div class="col golive-wrapper">
            <a href="index.php?view=LiveStream">
                <button type="button" class="btn btn-primary">Go live</button>
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <h5>Scheduled Events/Broadcasts (ListBroadCasts API used)</h5>
            <?php if (!empty($_smarty_tpl->tpl_vars['BROADCAST_ITEMS']->value)) {?>
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['BROADCAST_ITEM'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['BROADCAST_ITEM']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['BROADCAST_ITEMS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['BROADCAST_ITEM']->key => $_smarty_tpl->tpl_vars['BROADCAST_ITEM']->value) {
$_smarty_tpl->tpl_vars['BROADCAST_ITEM']->_loop = true;
?>
                        <li><a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['BROADCAST_ITEM']->value['snippet']['title'];?>
</a></li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <div class="alert alert-primary" role="alert">
                    No events scheduled
                </div>
            <?php }?>

        </div>
    </div>
</div><?php }} ?>
