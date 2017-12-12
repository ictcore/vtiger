<?php /* Smarty version Smarty-3.1.7, created on 2017-12-12 07:14:48
         compiled from "/usr/ictcore/wwwroot/vtigercrm/includes/runtime/../../layouts/v7/modules/ICTBroadcast/start_broadcasting1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6240586435a2e6f6fe62d12-18562412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '105df6015c396dc175f63530d4cd854536bfbfe0' => 
    array (
      0 => '/usr/ictcore/wwwroot/vtigercrm/includes/runtime/../../layouts/v7/modules/ICTBroadcast/start_broadcasting1.tpl',
      1 => 1513062865,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6240586435a2e6f6fe62d12-18562412',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a2e6f70035df',
  'variables' => 
  array (
    'MODULE' => 0,
    'TITLE' => 0,
    'SOURCE_MODULE' => 0,
    'VIEWNAME' => 0,
    'SELECTED_IDS' => 0,
    'EXCLUDED_IDS' => 0,
    'SEARCH_KEY' => 0,
    'OPERATOR' => 0,
    'ALPHABET_VALUE' => 0,
    'link' => 0,
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
<?php if ($_valid && !is_callable('content_5a2e6f70035df')) {function content_5a2e6f70035df($_smarty_tpl) {?>



<div id="sendSmsContainer" class='modal-xs modal-dialog'><div class = "modal-content"><!--  <button data-dismiss="modal" class="close" title="<?php echo vtranslate('LBL_CLOSE');?>
">&times;</button><h3>ICT Brodcasettest</h3></div>--><?php $_smarty_tpl->tpl_vars['TITLE'] = new Smarty_variable("ICTBroadcastingadeel12345678909dff", null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('TITLE'=>$_smarty_tpl->tpl_vars['TITLE']->value), 0);?>
<form class="form-horizontal" id="massSave1" method="post" action="index.php" enctype="multipart/form-data"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="source_module" value="<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE']->value;?>
" /><input type="hidden" name="action" value="MassSaveAjax" /><input type="hidden" name="viewname" value="<?php echo $_smarty_tpl->tpl_vars['VIEWNAME']->value;?>
" /><input type="hidden" name="selected_ids" value=<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['SELECTED_IDS']->value);?>
><input type="hidden" name="excluded_ids" value=<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['EXCLUDED_IDS']->value);?>
><input type="hidden" name="search_key" value= "<?php echo $_smarty_tpl->tpl_vars['SEARCH_KEY']->value;?>
" /><input type="hidden" name="operator" value="<?php echo $_smarty_tpl->tpl_vars['OPERATOR']->value;?>
" /><input type="hidden" name="search_value" value="<?php echo $_smarty_tpl->tpl_vars['ALPHABET_VALUE']->value;?>
" /><input type="hidden" name="link" value="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
" /><div class="modal-body"><div><span><strong>New Contact Group</strong></span>&nbsp;:&nbsp;</div><input type="text" name="group" class="form-control"><!--	<select name="fields[]" data-placeholder="<?php echo vtranslate('LBL_ADD_MORE_FIELDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
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
)<?php }?></option><?php } ?></optgroup></select>--><hr><div><span><strong>Select Campaign Type</strong></span>&nbsp;:&nbsp;</div><select name="campaing_type" class = "select2 form-control" id="c_type"><!--	<?php  $_smarty_tpl->tpl_vars['Campaign_types'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Campaign_types']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Campaign_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Campaign_types']->key => $_smarty_tpl->tpl_vars['Campaign_types']->value){
$_smarty_tpl->tpl_vars['Campaign_types']->_loop = true;
?><option value="<?php echo $_smarty_tpl->tpl_vars['Campaign_types']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['Campaign_types']->value->name;?>
</option><?php } ?>--><option value="voice">Message Campaign</option><!--<option value="voice_agent">Agent Campaign</option>--><option value="voice_interactive">Press 1 Campaign</option><!--<option value="voice_ivr">IVR Campaign</option>--><option value="fax">Fax Campaign</option></select><hr><div id="file"><span><strong>Choose File</strong></span>&nbsp;:&nbsp;<input type="file" name="fle"  class="input-large multi MultiFile-applied" ></div><hr><div id="press1" style="display:none"><span><strong>Select Extension</strong></span>&nbsp;:&nbsp;<select name="extension" class="select2 form-control"><?php  $_smarty_tpl->tpl_vars['Campaign_types'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Campaign_types']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Campaign_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Campaign_types']->key => $_smarty_tpl->tpl_vars['Campaign_types']->value){
$_smarty_tpl->tpl_vars['Campaign_types']->_loop = true;
?><option value="<?php echo $_smarty_tpl->tpl_vars['Campaign_types']->value->extension_id;?>
"><?php echo $_smarty_tpl->tpl_vars['Campaign_types']->value->name;?>
</option><?php } ?></select></div></div><div class="modal-footer"><div class=" pull-right cancelLinkContainer"><a class="cancelLink" type="reset" data-dismiss="modal">Cancel</a></div><button class="btn btn-success" type="submit" name="saveButton"><strong>New Campaign</strong></button></div></form></div>

<script type="text/javascript">
jQuery(document).ready(function() {

	  $("#c_type").change(function()
    {
        var id=$(this).val();

        var dataString = 'id='+ id;
        // alert(id); 
        if(id=='voice_interactive'){
        	// alert(id); 
          $("#file").show();
          $("#press1").show();

        }else{

        	$("#file").show();
        	$("#press1").hide();

        }
       
    });
});
</script><?php }} ?>