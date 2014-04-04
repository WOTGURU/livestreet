<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:59:15
         compiled from "/home/w/wotgur/wot.guru/public_html/plugins/simplerating/templates/skin/developer/blocks/block.blogs_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:881719847533ebab39ca7b4-73928444%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83222ea2ea9e0c9f5b540de7436b9388994ef39d' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/plugins/simplerating/templates/skin/developer/blocks/block.blogs_top.tpl',
      1 => 1359561662,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '881719847533ebab39ca7b4-73928444',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aBlogs' => 0,
    'oBlog' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533ebab39fc927_96577704',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533ebab39fc927_96577704')) {function content_533ebab39fc927_96577704($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cfg')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.cfg.php';
?><ul class="item-list">
	<?php  $_smarty_tpl->tpl_vars['oBlog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oBlog']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aBlogs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oBlog']->key => $_smarty_tpl->tpl_vars['oBlog']->value){
$_smarty_tpl->tpl_vars['oBlog']->_loop = true;
?>
		<li>
			<a href="<?php echo $_smarty_tpl->tpl_vars['oBlog']->value->getUrlFull();?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['oBlog']->value->getAvatarPath(48);?>
" alt="avatar" class="avatar" /></a>
			
			<?php if ($_smarty_tpl->tpl_vars['oBlog']->value->getType()=='close'){?><i title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['blog_closed'];?>
" class="icon icon-lock"></i><?php }?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['oBlog']->value->getUrlFull();?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['oBlog']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</a>
			
			<?php ob_start();?><?php echo smarty_function_cfg(array('name'=>'plugin.simplerating.sort_blogs_by_count_user'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
				<p><?php echo $_smarty_tpl->tpl_vars['aLang']->value['blogs_readers'];?>
: <strong><?php echo $_smarty_tpl->tpl_vars['oBlog']->value->getCountUser();?>
</strong></p>
			<?php }else{ ?>
				<p><?php echo $_smarty_tpl->tpl_vars['aLang']->value['infobox_blog_topics'];?>
: <strong><?php echo $_smarty_tpl->tpl_vars['oBlog']->value->getCountTopic();?>
</strong></p>
			<?php }?>
		</li>
	<?php } ?>
</ul>				<?php }} ?>