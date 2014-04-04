<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:16:44
         compiled from "/home/w/wotgur/wot.guru/public_html/plugins/aceadminpanel/templates/skin/default/hook.statistics_performance_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:232915791533eb0bc474682-42276584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '630497efb26fbba2df925bbcb80e540c98d356bb' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/plugins/aceadminpanel/templates/skin/default/hook.statistics_performance_item.tpl',
      1 => 1396282262,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '232915791533eb0bc474682-42276584',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aMemoryStats' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533eb0bc47db13_04612773',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533eb0bc47db13_04612773')) {function content_533eb0bc47db13_04612773($_smarty_tpl) {?><td>
    <h4>Memory</h4>
    memory limit: <strong><?php echo $_smarty_tpl->tpl_vars['aMemoryStats']->value['memory_limit'];?>
</strong><br/>
    memory usage: <strong><?php echo $_smarty_tpl->tpl_vars['aMemoryStats']->value['usage'];?>
</strong><br/>
    peak usage: <strong><?php echo $_smarty_tpl->tpl_vars['aMemoryStats']->value['peak_usage'];?>
</strong><br/>
</td>
<?php }} ?>