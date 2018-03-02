<?php
/* Smarty version 3.1.31, created on 2018-02-27 16:22:38
  from "/home/amadeusz/htdocs/rejestracja/app/View/templates/import.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a9577be95a7e3_50864765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df60072af189e877fd0fa34417396462a1c4c632' => 
    array (
      0 => '/home/amadeusz/htdocs/rejestracja/app/View/templates/import.html.php',
      1 => 1519744954,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a9577be95a7e3_50864765 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Import CSV</title>
	<meta charset="utf-8" /> 
</head>
<body>
	<form action="<?php echo $_smarty_tpl->tpl_vars['router']->value->makeUrl('page/importCSV');?>
" method="POST" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="send">
	</form>
</body>
</html><?php }
}
