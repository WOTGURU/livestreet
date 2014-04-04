<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:59:15
         compiled from "/home/w/wotgur/wot.guru/public_html/plugins/seopremium/templates/skin/default/meta/description/blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1640607596533ebab3408e95-63524696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7119024ad4496c7603c439c5239712c055b18c35' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/plugins/seopremium/templates/skin/default/meta/description/blog.tpl',
      1 => 1394793788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1640607596533ebab3408e95-63524696',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oBlog' => 0,
    'aTopics' => 0,
    'oTopic' => 0,
    'sHtmlDescription' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533ebab346d052_47234487',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533ebab346d052_47234487')) {function content_533ebab346d052_47234487($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['oBlog']->value){?><?php if ($_smarty_tpl->tpl_vars['oBlog']->value->getBlogSeoDescription()){?><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['oBlog']->value->getBlogSeoDescription()), ENT_QUOTES, 'UTF-8', true);?>
<?php }else{ ?><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['oBlog']->value->getTitle()), ENT_QUOTES, 'UTF-8', true);?>
:<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['oBlog']->value->getDescription()), ENT_QUOTES, 'UTF-8', true);?>
<?php }?><?php }elseif(count($_smarty_tpl->tpl_vars['aTopics']->value)>0){?><?php  $_smarty_tpl->tpl_vars['oTopic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oTopic']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aTopics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oTopic']->key => $_smarty_tpl->tpl_vars['oTopic']->value){
$_smarty_tpl->tpl_vars['oTopic']->_loop = true;
?><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['oTopic']->value->getTitle()), ENT_QUOTES, 'UTF-8', true);?>
<?php } ?><?php }elseif($_smarty_tpl->tpl_vars['oTopic']->value){?><?php if ($_smarty_tpl->tpl_vars['oTopic']->value->getTopicSeoDescription()){?><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['oTopic']->value->getTopicSeoDescription()), ENT_QUOTES, 'UTF-8', true);?>
<?php }else{ ?><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['oTopic']->value->getTitle()), ENT_QUOTES, 'UTF-8', true);?>
. <?php echo $_smarty_tpl->tpl_vars['sHtmlDescription']->value;?>
<?php }?><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['blogs'];?>
. <?php echo $_smarty_tpl->tpl_vars['sHtmlDescription']->value;?>
<?php }?><?php }} ?>