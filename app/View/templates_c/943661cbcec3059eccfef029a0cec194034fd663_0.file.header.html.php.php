<?php
/* Smarty version 3.1.31, created on 2018-02-23 09:12:34
  from "D:\xampp\htdocs\rejestracja\app\View\templates\header.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a8fccf2a99602_40389351',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '943661cbcec3059eccfef029a0cec194034fd663' => 
    array (
      0 => 'D:\\xampp\\htdocs\\rejestracja\\app\\View\\templates\\header.html.php',
      1 => 1519310671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a8fccf2a99602_40389351 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Obywatelski</title>
    
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['router']->value->publicWeb('js/jquery.js');?>
"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 defer src="<?php echo $_smarty_tpl->tpl_vars['router']->value->publicWeb('js/fontawesome-all.min.js');?>
"><?php echo '</script'; ?>
>
    <link href="<?php echo $_smarty_tpl->tpl_vars['router']->value->publicWeb('css/fa-svg-with-js.css');?>
" rel="stylesheet">

	<link href="<?php echo $_smarty_tpl->tpl_vars['router']->value->publicWeb('css/style.css');?>
" rel="stylesheet" type="text/css" />

    <link href="<?php echo $_smarty_tpl->tpl_vars['router']->value->publicWeb('css/bootstrap.css');?>
" rel="stylesheet" id="bootstrap-css">
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['router']->value->publicWeb('js/bootstrap.js');?>
"><?php echo '</script'; ?>
>

    <link href="<?php echo $_smarty_tpl->tpl_vars['router']->value->publicWeb('css/materializewizard.css');?>
" rel="stylesheet" type="text/css" />
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['router']->value->publicWeb('js/materializewizard.js');?>
"><?php echo '</script'; ?>
>

</head>
<body>
<?php }
}
