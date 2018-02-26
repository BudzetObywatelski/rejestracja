<?php
/* Smarty version 3.1.31, created on 2018-02-26 13:16:02
  from "D:\xampp\htdocs\rejestracja\app\View\templates\users\index.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a93fa82e91c72_67266757',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5b832395261658d16e37e76e3e9d9d533648f34' => 
    array (
      0 => 'D:\\xampp\\htdocs\\rejestracja\\app\\View\\templates\\users\\index.html.php',
      1 => 1519647358,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.html.php' => 1,
    'file:../footer.html.php' => 1,
  ),
),false)) {
function content_5a93fa82e91c72_67266757 (Smarty_Internal_Template $_smarty_tpl) {
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
													<h5><b>Serdecznie zapraszamy do udziału w&nbsp;panelu obywatelskim!</b> Aby wziąć
													udział w&nbsp;ostatecznym losowaniu panelistów i&nbsp;panelistek, prosimy o
													wypełnienie zgłoszenia.</h5>
													<p class="text-center">Rejestracja przez internet jest otwarta do …..marca 2018 r., do godz. 23:59.<br/>
													Więcej informacji o panelu obywatelskim w&nbsp;Lublinie jest dostępnych <a href="#">tutaj.</a>
													</p>
												</div>
			                            	</div>

			                            	<?php } else { ?>

		                                	<div class="col-sm-12 login-form">
		                                		<div class="col-sm-6">
		                                			<h4 style="text-align: center;"> Logowanie</h4>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fas fa-user"></i>
														</span>
														<div class="form-group label-floating">
				                                          	<label class="control-label">Imie, tylko pierwsze imię, bez nazwiska</label>
				                                          	<input name="name" type="text" class="form-control" autocomplete="off">
				                                        </div>
													</div>

													<div class="input-group">
														<span class="input-group-addon">
															<i class="fas fa-lock"></i>
														</span>
														<div class="form-group label-floating">
				                                          	<label class="control-label">Kod identyfikacyjny, jest w&nbsp;zaproszeniu</label>
				                                          	<input name="pass" type="password" class="form-control" autocomplete="new-password">
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
		            firstname: login,
		            pass_code: pass
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
