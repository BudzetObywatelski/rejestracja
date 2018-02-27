<?php
/* Smarty version 3.1.31, created on 2018-02-27 10:19:24
  from "/home/amadeusz/htdocs/rejestracja/app/View/templates/users/step2.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a95229ca787e2_49457259',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ba5dbee15c0274a165d98f5b60f984e228921bb' => 
    array (
      0 => '/home/amadeusz/htdocs/rejestracja/app/View/templates/users/step2.html.php',
      1 => 1519722721,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.html.php' => 1,
    'file:../footer.html.php' => 1,
  ),
),false)) {
function content_5a95229ca787e2_49457259 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="image-container set-full-height" style="background-image: url('http://demos.creative-tim.com/material-bootstrap-wizard/assets/img/wizard-book.jpg')">

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		        	
		            <!-- Wizard container -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="red" id="wizard">
		                	<div class="loading">
				        		<i class="fas fa-spinner rotating"></i>
				        	</div>
		                    <form action="" method="">
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        		Panel obywatelski
		                        	</h3>
		                    	</div>
								<div class="wizard-navigation">
									<ul id="navTab">
			                            <li><a>Logowanie</a></li>
			                            <li class="active"><a href="#schedule" data-toggle="tab">Terminy</a></li>
			                            <li><a>Dane osobowe</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane active" id="schedule">
		                                <div class="info-text"><h5><b>Potwierdzenie możliwości wzięcia udziału w&nbsp;panelu obywatelskim</b></h5>
										</div>
										<div class="important-checkbox">
											<div class="checkbox">
											    <label>
												    <input type="checkbox" name="">
											    </label>
											    Oświadczam, że mogę wziąć udział we wszystkich spotkaniach panelu obywatelskiego, które odbędą się w&nbsp;następujących terminach:
										    </div>
										</div>
		                                <div class="row">
		                                    <div class="col-sm-10">
		                                        <div class="col-sm-4">
		                                        	<ul>
			                                        	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['deadlines']->value, 'deadline');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['deadline']->value) {
?>
			                                            <li>
														    <?php echo $_smarty_tpl->tpl_vars['deadline']->value['value'];?>

													    </li>
													    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

													</ul>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input type='button' class='btn btn-fill btn-success btn-wd check-checked' name='next' value='Dalej' />
	                                </div>
	                                <div class="pull-left">
	                                    <a href="<?php echo $_smarty_tpl->tpl_vars['router']->value->makeUrl('panel,panel/logout');?>
" class='btn btn-fill btn-default btn-wd'>Wyloguj</a>

<!-- 										<div class="footer-checkbox">
											<div class="col-sm-12">
											  <div class="checkbox">
												  <label>
													  <input type="checkbox" name="optionsCheckboxes">
												  </label>
												  Subscribe to our newsletter
											  </div>
										  </div>
										</div> -->
	                                </div>
	                                <div class="clearfix"></div>
	                        	</div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
		</div> <!--  big container -->
	</div>
	<?php echo '<script'; ?>
 type="text/javascript">
		$( document ).ready(function() {
			var canGo;
			var deadlines = $('form').find('input[type="checkbox"]');
			$('.loading').remove();
			$('.check-checked').click(function(){
				canGo = true;
				if(!$(deadlines).prop('checked')){
					toastr.error('Nie zostały zaznaczone wszystkie terminy!')
					canGo = false;
				}
				if(canGo){
					window.location.replace("#");
				}
			});
		});
	<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:../footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
