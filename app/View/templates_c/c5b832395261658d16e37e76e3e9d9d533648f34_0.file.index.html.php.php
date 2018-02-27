<?php
/* Smarty version 3.1.31, created on 2018-02-27 10:02:29
  from "D:\xampp\htdocs\rejestracja\app\View\templates\users\index.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a951ea5b3d5f5_93030134',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5b832395261658d16e37e76e3e9d9d533648f34' => 
    array (
      0 => 'D:\\xampp\\htdocs\\rejestracja\\app\\View\\templates\\users\\index.html.php',
      1 => 1519721054,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.html.php' => 1,
    'file:../footer.html.php' => 1,
  ),
),false)) {
function content_5a951ea5b3d5f5_93030134 (Smarty_Internal_Template $_smarty_tpl) {
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
		                    <form action="" method="" autocomplete="off">
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        		Panel obywatelski
		                        	</h3>
		                    	</div>
								<div class="wizard-navigation">
									<ul id="navTab">
			                            <li class="active"><a href="#login" data-toggle="tab">Logowanie</a></li>
			                            <li><a>Terminy</a></li>
			                            <li><a>Dane osobowe</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane active" id="login">
		                            	<div class="row">

		                            		<?php if (!isset($_smarty_tpl->tpl_vars['allowLogin']->value) || !$_smarty_tpl->tpl_vars['allowLogin']->value) {?>

			                            	<div class="col-sm-12">
			                            		<div class="time-info">
													<h5 class="text-center"><b>Serdecznie zapraszamy do udziału w&nbsp;panelu obywatelskim<br/> „Co zrobić aby oddychać czystym powietrzem w&nbsp;Lublinie”!</b></h5>

													<p>Aby wziąć udział w&nbsp;ostatecznym losowaniu panelistów i&nbsp;panelistek, prosimy o&nbsp;wypełnienie zgłoszenia. W&nbsp;tym celu prosimy o&nbsp;przygotowanie otrzymanego pocztą zaproszenia wraz z kodem identyfikacyjnym.<br/>
													Rejestracja przez Internet jest otwarta do 12 marca 2018 r., do godz. 23:59.<br/>
													Więcej informacji o&nbsp;panelu obywatelskim w&nbsp;Lublinie jest dostępnych na <a href="#">www.strona.pl</a>.<br/>
													Kontakt telefoniczny: 123 456 789<br/>
													Email: xd@xd.pl
													</p>
												</div>
			                            	</div>

			                            	<?php } else { ?>

		                                	<div class="col-sm-12 login-form">
		                                		<div class="col-sm-6">
		                                			<h4 style="text-align: center;"> Logowanie</h4>
		                                			<div class="input-group">
														<span class="input-group-addon">
															<i class="fas fa-lock"></i>
														</span>
														<div class="form-group label-floating">
				                                          	<label class="control-label">Kod identyfikacyjny, jest w&nbsp;zaproszeniu</label>
				                                          	<input name="pass" type="password" class="form-control" autocomplete="new-password">
				                                        </div>
													</div>

													<div class="input-group">
														<span class="input-group-addon">
															<i class="fas fa-birthday-cake"></i>
														</span>
														<div class="form-group label-floating">
				                                          	<label class="control-label">Data urodzenia</label>
				                                          	<input name="bday" type="date" class="form-control" value="2000-01-01">
				                                        </div>
													</div>
			                                	</div>
			                                </div>

			                                <?php }?>

		                                	<div class="col-sm-12">
		                                		<div class="under-text">
			                                		<span class="info-text">
			                                		Dla zapewnienia bezstronności i&nbsp;wiarygodności panelu obywatelskiego, uprzejmie prosimy, aby nie rejestrowali się radni miejscy, dyrektorzy wydziałów z&nbsp;Urzędu Miasta Lublin oraz osoby, które w&nbsp;bezpośredni sposób są związane z&nbps;tematyką panelu (na przykład są pertami w&nbsp;danej dziedzinie).</span>
			                                	</div>
		                                	</div>
		                            	</div>
		                            </div>
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input type='button' class='btn btn-fill btn-success btn-wd login-button' name='Login' value="login"/>
	                                </div>
	                                <div class="pull-left footer-contact">
	                                	<span>
		                                	Kontakt telefoniczny: 123 456 789<br/>
											Email: beo@lublin.pl
										</span>
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
		function login(login, pass){
		    $.ajax({
		        method:'POST',
		        url:'<?php echo $_smarty_tpl->tpl_vars['router']->value->makeUrl("users/login");?>
',
		        data: {
		            firstname: 'amadeusz',
		            pass_code: '123'
		        },
		        cache: false,
		        success:function(response){
		            console.log(response)
		            if(response.code == 200){
		            	toastr.success(response.response);
		            	location.reload();
		            }
		        },
		        error:function(response){
		        	$.each(response.responseJSON.errors, function(key, error){
	            		toastr.error(error)
	            	})
		        }
		    })
		}

		$( document ).ready(function() {
			$('.loading').remove();
		    $('.login-button').click(function(){
		    	var login_cred = $('form').find('input[name="name"]').val();
		    	var pass_cred = $('form').find('input[name="pass"]').val();
		        login(login_cred, pass_cred);
		    })
		});
	<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:../footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
