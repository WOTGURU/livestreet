<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:59:15
         compiled from "/home/w/wotgur/wot.guru/public_html/plugins/seopremium/templates/skin/default/meta/keywords/blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1336921898533ebab34749b9-14439379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f2332b962bbf48d9588ffe1183e9b17d6757859' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/plugins/seopremium/templates/skin/default/meta/keywords/blog.tpl',
      1 => 1394793788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1336921898533ebab34749b9-14439379',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oBlog' => 0,
    'sHtmlKeywords' => 0,
    'aTopics' => 0,
    'oTopic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533ebab34d1c77_34034197',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533ebab34d1c77_34034197')) {function content_533ebab34d1c77_34034197($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['oBlog']->value){?><?php if ($_smarty_tpl->tpl_vars['oBlog']->value&&$_smarty_tpl->tpl_vars['oBlog']->value->getBlogSeoKeyword()){?><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['oBlog']->value->getBlogSeoKeyword()), ENT_QUOTES, 'UTF-8', true);?>
<?php }else{ ?><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['oBlog']->value->getTitle()), ENT_QUOTES, 'UTF-8', true);?>
, <?php echo $_smarty_tpl->tpl_vars['sHtmlKeywords']->value;?>
<?php }?><?php }elseif(count($_smarty_tpl->tpl_vars['aTopics']->value)>0){?><?php  $_smarty_tpl->tpl_vars['oTopic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oTopic']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aTopics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oTopic']->key => $_smarty_tpl->tpl_vars['oTopic']->value){
$_smarty_tpl->tpl_vars['oTopic']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['oTopic']->value->getTopicSeoKeyword()){?><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['oTopic']->value->getTopicSeoKeyword()), ENT_QUOTES, 'UTF-8', true);?>
<?php }else{ ?><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['oTopic']->value->getTitle()), ENT_QUOTES, 'UTF-8', true);?>
,<?php }?><?php } ?><?php }elseif($_smarty_tpl->tpl_vars['oTopic']->value){?><?php if ($_smarty_tpl->tpl_vars['oTopic']->value->getTopicSeoKeyword()){?><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['oTopic']->value->getTopicSeoKeyword()), ENT_QUOTES, 'UTF-8', true);?>
<?php }else{ ?><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['oTopic']->value->getTitle()), ENT_QUOTES, 'UTF-8', true);?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['oTopic']->value->getTags(), ENT_QUOTES, 'UTF-8', true);?>
<?php }?><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sHtmlKeywords']->value;?>
<?php }?><?php }} ?>