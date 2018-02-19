<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-02-19 10:27:19
         compiled from "templates\LiveStream.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35495a892af64a0904-19057542%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '130778ae8141aab7b44e8e6d7d2ab0f8c3d7bf20' => 
    array (
      0 => 'templates\\LiveStream.tpl',
      1 => 1519036031,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35495a892af64a0904-19057542',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a892af6524ec1_91742997',
  'variables' => 
  array (
    'BROADCAST_RESPONSE' => 0,
    'LIVE_CHAT_MESSAGES' => 0,
    'LIVE_CHAT_ID' => 0,
    'LIVE_CHAT_MESSAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a892af6524ec1_91742997')) {function content_5a892af6524ec1_91742997($_smarty_tpl) {?><div class="container">
    <div class="row">
        <div class="col">
            <div class="alert alert-success" role="alert" style="margin-top: 1%;">
                <?php echo $_smarty_tpl->tpl_vars['BROADCAST_RESPONSE']->value['items'][0]['snippet']['title'];?>
 event is now live (Broadcast, Live Stream, Bind and video APIs used)
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <?php echo $_smarty_tpl->tpl_vars['BROADCAST_RESPONSE']->value['items'][0]['contentDetails']['monitorStream']['embedHtml'];?>

        </div>
        <div class="col">
            <div class="container">
                <div class="row">
                    <div style="width: 100%;">
                        <nav class="navbar navbar-light bg-light">
                            <span class="navbar-brand mb-0 h1">Chat (insert, list liveChatMessages APIs used)</span>
                            <span class="pull-right" style="cursor: pointer;"><a href="#search-database"><i class="fas fa-search"></i></a></span>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container chats-container">
                <input type="hidden" name="chat-next-page-token" id="chat-next-page-token" value="<?php echo $_smarty_tpl->tpl_vars['LIVE_CHAT_MESSAGES']->value['nextPageToken'];?>
" />
                <input type="hidden" name="chat-polling-interval-millis" id="chat-polling-interval-millis" value="<?php echo $_smarty_tpl->tpl_vars['LIVE_CHAT_MESSAGES']->value['pollingIntervalMillis'];?>
" />
                <input type="hidden" name="live-chat-id" id="live-chat-id" value="<?php echo $_smarty_tpl->tpl_vars['LIVE_CHAT_ID']->value;?>
" />
                <?php  $_smarty_tpl->tpl_vars['LIVE_CHAT_MESSAGE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LIVE_CHAT_MESSAGE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LIVE_CHAT_MESSAGES']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LIVE_CHAT_MESSAGE']->key => $_smarty_tpl->tpl_vars['LIVE_CHAT_MESSAGE']->value) {
$_smarty_tpl->tpl_vars['LIVE_CHAT_MESSAGE']->_loop = true;
?>
                    <div class="row">
                        <div class="col chat-message-content">
                            <span>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['LIVE_CHAT_MESSAGE']->value['authorDetails']['profileImageUrl'];?>
" height="24" width="24">
                            </span>
                            <span class="authorDetails">
                                <?php echo $_smarty_tpl->tpl_vars['LIVE_CHAT_MESSAGE']->value['authorDetails']['displayName'];?>
: 
                            </span>
                            <span class="message">
                                <?php echo $_smarty_tpl->tpl_vars['LIVE_CHAT_MESSAGE']->value['snippet']['displayMessage'];?>

                            </span>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <a href="javascript:void(0)" id="update-chat"><i class="fas fa-sync"></i> - Click to check for new messages and update chat (This is to limit API hits in non-production env) </a>
                        <div class="input-group mb-3" style="margin-top: 10px;">
                            <input type="text" class="form-control" placeholder="Enter your message" id="chat-message-input">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="post-message">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div id="search-database">
                <h5>Database search (Not a google API search)</h5>
                <div class="input-group mb-3" style="margin-top: 10px;">
                    <input type="text" class="form-control" id="search-user-name-key" placeholder="Type username">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" id="search-messages-from-db" type="button">Search</button>
                    </div>
                </div>
                <div id="search-results">
                    <div class="alert alert-info" role="alert">
                        Search Results will be shown here.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div id="chat-hype">
                <h5>Bonus: The sample chat hype gauge with mock data (No APIs used). Thanks to highcharts for the library and samples!</h5>
                <div id="container-chat-hype"></div>
            </div>
        </div>
    </div>
</div><?php }} ?>
