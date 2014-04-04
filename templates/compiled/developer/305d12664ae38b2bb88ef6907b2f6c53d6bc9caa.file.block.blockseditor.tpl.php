<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:59:15
         compiled from "/home/w/wotgur/wot.guru/public_html/plugins/blockseditor/templates/skin/default/blocks/block.blockseditor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:600902392533ebab38bcf70-79693721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '305d12664ae38b2bb88ef6907b2f6c53d6bc9caa' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/plugins/blockseditor/templates/skin/default/blocks/block.blockseditor.tpl',
      1 => 1360574306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '600902392533ebab38bcf70-79693721',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oConfig' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533ebab38c4071_63361273',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533ebab38c4071_63361273')) {function content_533ebab38c4071_63361273($_smarty_tpl) {?>
  <!-- Blockseditor plugin -->
  <div class="block Blockseditor">
    <?php echo $_smarty_tpl->tpl_vars['oConfig']->value->GetValue("plugin.blockseditor.Block_Content");?>

  </div>
  <!-- /Blockseditor plugin -->
<?php }} ?>