<?php /* Smarty version Smarty-3.1.7, created on 2017-11-24 10:36:58
         compiled from "/usr/ictcore/wwwroot/vtigerCRM/includes/runtime/../../layouts/vlayout/modules/Vtiger/start_broadcasting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15285818825a1672bc16d8b6-99234870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bafda1488b708de3b4c7a63b5e2b9ce469a2f42b' => 
    array (
      0 => '/usr/ictcore/wwwroot/vtigerCRM/includes/runtime/../../layouts/vlayout/modules/Vtiger/start_broadcasting.tpl',
      1 => 1511519771,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15285818825a1672bc16d8b6-99234870',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a1672bc204c8',
  'variables' => 
  array (
    'MODULE' => 0,
    'SOURCE_MODULE' => 0,
    'VIEWNAME' => 0,
    'SELECTED_IDS' => 0,
    'EXCLUDED_IDS' => 0,
    'SEARCH_KEY' => 0,
    'OPERATOR' => 0,
    'ALPHABET_VALUE' => 0,
    'PHONE_FIELDS' => 0,
    'PHONE_FIELD' => 0,
    'PHONE_FIELD_NAME' => 0,
    'SINGLE_RECORD' => 0,
    'FIELD_VALUE' => 0,
    'NAME_FIELDS' => 0,
    'NAME_FIELD' => 0,
    'FIELD_NAME' => 0,
    'FIELD_VALUE1' => 0,
    'Campaign_type' => 0,
    'Campaign_types' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a1672bc204c8')) {function content_5a1672bc204c8($_smarty_tpl) {?>
<div id="sendSmsContainer" class='modelContainer'><div class="modal-header contentsBackground"><button data-dismiss="modal" class="close" title="<?php echo vtranslate('LBL_CLOSE');?>
">&times;</button><h3>ICT Brodcaset</h3></div><form class="form-horizontal" id="massSave1" method="post" action="index.php"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="source_module" value="<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE']->value;?>
" /><input type="hidden" name="action" value="MassSaveAjax" /><input type="hidden" name="viewname" value="<?php echo $_smarty_tpl->tpl_vars['VIEWNAME']->value;?>
" /><input type="hidden" name="selected_ids" value=<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['SELECTED_IDS']->value);?>
><input type="hidden" name="excluded_ids" value=<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['EXCLUDED_IDS']->value);?>
><input type="hidden" name="search_key" value= "<?php echo $_smarty_tpl->tpl_vars['SEARCH_KEY']->value;?>
" /><input type="hidden" name="operator" value="<?php echo $_smarty_tpl->tpl_vars['OPERATOR']->value;?>
" /><input type="hidden" name="search_value" value="<?php echo $_smarty_tpl->tpl_vars['ALPHABET_VALUE']->value;?>
" /><div class="modal-body tabbable"><div><span><strong>New Contact Group</strong></span>&nbsp;:&nbsp;</div><input type="text" name="group" class="chzn-text"><!--	<select name="fields[]" data-placeholder="<?php echo vtranslate('LBL_ADD_MORE_FIELDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" multiple class="chzn-select"><optgroup><?php  $_smarty_tpl->tpl_vars['PHONE_FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['PHONE_FIELD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PHONE_FIELDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['PHONE_FIELD']->key => $_smarty_tpl->tpl_vars['PHONE_FIELD']->value){
$_smarty_tpl->tpl_vars['PHONE_FIELD']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['PHONE_FIELD_NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['PHONE_FIELD']->value->get('name'), null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['PHONE_FIELD_NAME']->value;?>
"><?php if (!empty($_smarty_tpl->tpl_vars['SINGLE_RECORD']->value)){?><?php $_smarty_tpl->tpl_vars['FIELD_VALUE'] = new Smarty_variable($_smarty_tpl->tpl_vars['SINGLE_RECORD']->value->get($_smarty_tpl->tpl_vars['PHONE_FIELD_NAME']->value), null, 0);?><?php }?><?php echo vtranslate($_smarty_tpl->tpl_vars['PHONE_FIELD']->value->get('label'),$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
<?php if (!empty($_smarty_tpl->tpl_vars['FIELD_VALUE']->value)){?> (<?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
)<?php }?></option><?php } ?></optgroup><optgroup>foreach $contact as $key => $value<?php  $_smarty_tpl->tpl_vars['NAME_FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['NAME_FIELDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['NAME_FIELD']->key => $_smarty_tpl->tpl_vars['NAME_FIELD']->value){
$_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['NAME_FIELD']->key;
?><?php $_smarty_tpl->tpl_vars['FIELD_NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['NAME_FIELD']->value->get('name'), null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
"><?php if (!empty($_smarty_tpl->tpl_vars['SINGLE_RECORD']->value)){?><?php $_smarty_tpl->tpl_vars['FIELD_VALUE1'] = new Smarty_variable($_smarty_tpl->tpl_vars['SINGLE_RECORD']->value->get($_smarty_tpl->tpl_vars['FIELD_NAME']->value), null, 0);?><?php }?><?php echo vtranslate($_smarty_tpl->tpl_vars['NAME_FIELD']->value->get('label'),$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
<?php if (!empty($_smarty_tpl->tpl_vars['FIELD_VALUE1']->value)){?> (<?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE1']->value;?>
)<?php }?></option><?php } ?></optgroup></select>--><hr><div><span><strong>Select Campaign Type</strong></span>&nbsp;:&nbsp;</div><select name="campaing_type" class="chzn-select"><!--	<?php  $_smarty_tpl->tpl_vars['Campaign_types'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Campaign_types']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Campaign_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Campaign_types']->key => $_smarty_tpl->tpl_vars['Campaign_types']->value){
$_smarty_tpl->tpl_vars['Campaign_types']->_loop = true;
?><option value="<?php echo $_smarty_tpl->tpl_vars['Campaign_types']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['Campaign_types']->value->name;?>
</option><?php } ?>--><option value="voice">Message Campaign</option><option value="voice_agent">Agent Campaign</option><option value="voice_interactive">Interactive Campaign</option><option value="voice_ivr">IVR Campaign</option><option value="fax">Fax Campaign</option></select></div><div class="modal-footer"><div class=" pull-right cancelLinkContainer"><a class="cancelLink" type="reset" data-dismiss="modal">Cancel</a></div><button class="btn btn-success" type="submit" name="saveButton"><strong>New Campaign</strong></button></div></form></div><?php }} ?>