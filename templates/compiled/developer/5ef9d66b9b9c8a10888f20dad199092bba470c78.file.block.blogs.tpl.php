<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:59:15
         compiled from "/home/w/wotgur/wot.guru/public_html/templates/skin/developer/blocks/block.blogs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1396119576533ebab3a04295-06295052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ef9d66b9b9c8a10888f20dad199092bba470c78' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/templates/skin/developer/blocks/block.blogs.tpl',
      1 => 1396272497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1396119576533ebab3a04295-06295052',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aLang' => 0,
    'oUserCurrent' => 0,
    'sBlogsTop' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533ebab3a1bd67_82127838',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533ebab3a1bd67_82127838')) {function content_533ebab3a1bd67_82127838($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.router.php';
?><div class="block" id="block_blogs">
	<header class="block-header">
		<h3><?php echo $_smarty_tpl->tpl_vars['aLang']->value['block_blogs'];?>
</h3>
		<div class="block-update js-block-blogs-update"></div>
	</header>
	
	
	<div class="block-content">
		<ul class="nav nav-pills js-block-blogs-nav">
			<li class="active js-block-blogs-item" data-type="top"><a href="#"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['block_blogs_top'];?>
</a></li>
			<?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value){?>
				<li class="js-block-blogs-item" data-type="join"><a href="#"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['block_blogs_join'];?>
</a></li>
				<li class="js-block-blogs-item" data-type="self"><a href="#"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['block_blogs_self'];?>
</a></li>
			<?php }?>
		</ul>
		
		
		<div class="js-block-blogs-content">
			<?php echo $_smarty_tpl->tpl_vars['sBlogsTop']->value;?>

		</div>

		
		<footer>
			<a href="<?php echo smarty_function_router(array('page'=>'blogs'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['block_blogs_all'];?>
</a>
		</footer>
	</div>
</div>
<?php }} ?>