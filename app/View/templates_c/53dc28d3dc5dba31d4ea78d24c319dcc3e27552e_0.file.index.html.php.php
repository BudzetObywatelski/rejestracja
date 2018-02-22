<?php
/* Smarty version 3.1.31, created on 2018-02-21 12:49:28
  from "/home/amadeusz/htdocs/rejestracja/app/View/templates/users/index.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a8d5cc8946e27_45826129',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53dc28d3dc5dba31d4ea78d24c319dcc3e27552e' => 
    array (
      0 => '/home/amadeusz/htdocs/rejestracja/app/View/templates/users/index.html.php',
      1 => 1519213767,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.html.php' => 1,
    'file:../footer.html.php' => 1,
  ),
),false)) {
function content_5a8d5cc8946e27_45826129 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

Logowanie

<form action="" method="">
	Imię:
	<input type="text" name="firstname"><br>
	Kod:
	<input type="password" name="pass_code">
</form>
<?php $_smarty_tpl->_subTemplateRender("file:../footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
