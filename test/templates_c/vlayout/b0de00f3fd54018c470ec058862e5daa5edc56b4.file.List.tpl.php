<?php /* Smarty version Smarty-3.1.7, created on 2017-11-21 11:13:38
         compiled from "/usr/ictcore/wwwroot/vtigerCRM/includes/runtime/../../layouts/vlayout/modules/HelloWorld/List.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11259928195a140a621b0901-22028119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0de00f3fd54018c470ec058862e5daa5edc56b4' => 
    array (
      0 => '/usr/ictcore/wwwroot/vtigerCRM/includes/runtime/../../layouts/vlayout/modules/HelloWorld/List.tpl',
      1 => 1511262763,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11259928195a140a621b0901-22028119',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a140a621bc9e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a140a621bc9e')) {function content_5a140a621bc9e($_smarty_tpl) {?><h1><?php echo vtranslate('Hello World',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h1>
<h4><?php echo vtranslate('LBL_WELCOME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4>
<?php }} ?>