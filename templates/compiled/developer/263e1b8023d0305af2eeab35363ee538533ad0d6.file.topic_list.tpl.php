<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:59:15
         compiled from "/home/w/wotgur/wot.guru/public_html/templates/skin/developer/topic_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1984837315533ebab3867194-88480745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '263e1b8023d0305af2eeab35363ee538533ad0d6' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/templates/skin/developer/topic_list.tpl',
      1 => 1396548645,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1984837315533ebab3867194-88480745',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aTopics' => 0,
    'oTopic' => 0,
    'LS' => 0,
    'sTopicTemplateName' => 0,
    'aPaging' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533ebab38a32f3_30999191',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533ebab38a32f3_30999191')) {function content_533ebab38a32f3_30999191($_smarty_tpl) {?><?php if (!is_callable('smarty_function_add_block')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.add_block.php';
?><?php if (count($_smarty_tpl->tpl_vars['aTopics']->value)>0){?>
	<?php echo smarty_function_add_block(array('group'=>'toolbar','name'=>'toolbar_topic.tpl','iCountTopic'=>count($_smarty_tpl->tpl_vars['aTopics']->value)),$_smarty_tpl);?>


	<?php  $_smarty_tpl->tpl_vars['oTopic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oTopic']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aTopics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oTopic']->key => $_smarty_tpl->tpl_vars['oTopic']->value){
$_smarty_tpl->tpl_vars['oTopic']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['LS']->value->Topic_IsAllowTopicType($_smarty_tpl->tpl_vars['oTopic']->value->getType())){?>
			<?php $_smarty_tpl->tpl_vars["sTopicTemplateName"] = new Smarty_variable("topic_".($_smarty_tpl->tpl_vars['oTopic']->value->getType()).".tpl", null, 0);?>
			<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['sTopicTemplateName']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('bTopicList'=>true), 0);?>

		<?php }?>
	<?php } ?>

	<?php echo $_smarty_tpl->getSubTemplate ('paging.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('aPaging'=>$_smarty_tpl->tpl_vars['aPaging']->value), 0);?>

<?php }else{ ?>
	<?php echo $_smarty_tpl->tpl_vars['aLang']->value['blog_no_topic'];?>

<?php }?><?php }} ?>