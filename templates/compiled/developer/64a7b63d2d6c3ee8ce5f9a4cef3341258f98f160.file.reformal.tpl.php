<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:16:46
         compiled from "/home/w/wotgur/wot.guru/public_html/plugins/reformal/templates/skin/default/reformal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2049690318533eb0bee8da07-10723708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64a7b63d2d6c3ee8ce5f9a4cef3341258f98f160' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/plugins/reformal/templates/skin/default/reformal.tpl',
      1 => 1329839546,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2049690318533eb0bee8da07-10723708',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sAction' => 0,
    'oConfig' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533eb0beeb0e40_82050243',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533eb0beeb0e40_82050243')) {function content_533eb0beeb0e40_82050243($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['sAction']->value=='index'){?>
<script type="text/javascript">
    var reformalOptions = {
        project_id: <?php echo $_smarty_tpl->tpl_vars['oConfig']->value->getValue('plugin.reformal.project_id');?>
,
        project_host: "<?php echo $_smarty_tpl->tpl_vars['oConfig']->value->getValue('plugin.reformal.project_host');?>
",
        tab_orientation: "<?php echo $_smarty_tpl->tpl_vars['oConfig']->value->getValue('plugin.reformal.tab_orientation');?>
",
        tab_indent: <?php echo $_smarty_tpl->tpl_vars['oConfig']->value->getValue('plugin.reformal.tab_indent');?>
,
        tab_bg_color: "<?php echo $_smarty_tpl->tpl_vars['oConfig']->value->getValue('plugin.reformal.tab_bg_color');?>
",
        tab_border_color: "<?php echo $_smarty_tpl->tpl_vars['oConfig']->value->getValue('plugin.reformal.tab_border_color');?>
",
        tab_image_url: "<?php echo $_smarty_tpl->tpl_vars['oConfig']->value->getValue('plugin.reformal.tab_image_url');?>
",
        tab_border_width: <?php echo $_smarty_tpl->tpl_vars['oConfig']->value->getValue('plugin.reformal.tab_border_width');?>

    };
    
    (function() {
        var script = document.createElement('script');
        script.type = 'text/javascript'; script.async = true;
        script.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'media.reformal.ru/widgets/v2/reformal.js';
        document.getElementsByTagName('head')[0].appendChild(script);
    })();
</script>
<?php }?><?php }} ?>