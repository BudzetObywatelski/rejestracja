<?php
/* Smarty version 3.1.31, created on 2018-02-20 14:14:25
  from "/home/amadeusz/htdocs/rejestracja/app/View/templates/index.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a8c1f3143cda5_94396071',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '378571f75f132272cd9213ea895bec221ada9451' => 
    array (
      0 => '/home/amadeusz/htdocs/rejestracja/app/View/templates/index.html.php',
      1 => 1519132409,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a8c1f3143cda5_94396071 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">

    <h1 class="font-header">Great Job! - You did it!</h1>
    <p class="lead">This page you can edit in <small> View/templates/index.html.php</small> </p>

    <h3 class="font-header">First Step</h3>
    <p class="lead font-slim">Edit your config.php file in folder web/ </p>
    <p class="lead font-slim"> Set up your HTTP_HOST path for developer.</p>
    <p class="lead font-slim"> Default is <code>define('HTTP_HOST', $_SERVER['HTTP_HOST'].'/Dframe-demo');</code> Change <b>/Dframe-demo</b> to 
    your folder.</p>

    <br>

    <h4>Links</h4>
    Documentation <a href="http://dframeframework.com" target="_blank">https://dframeframework.com</a><br>
    Github <a href="https://github.com/dframe/dframe" target="_blank">https://github.com/dframe/dframe</a>
</div> <!-- /container -->
<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
