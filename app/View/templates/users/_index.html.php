{include file="../header.html.php"}

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

		                            		{if !isset($allowLogin) OR !$allowLogin}

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

			                            	{else}
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

			                                <div class="tab-content col-sm-12">
					                            <div class="tab-pane active" id="schedule">
													<div class="important-checkbox">
														<div class="checkbox">
														    <label>
															    <input type="checkbox" name="">
														    </label>
														    <span>Oświadczam, że mogę wziąć udział we wszystkich spotkaniach panelu obywatelskiego, które odbędą się w&nbsp;następujących terminach:</span>
													    </div>
													</div>
					                                <div class="row">
					                                    <div class="col-sm-12">
					                                        <div class="col-sm-12 dl-list">
					                                        	
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>

			                                {/if}
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
		</div> <!--  big container xd -->
	</div>

	<script type="text/javascript">
		moment.locale('pl');

		function login(bday, pass){
		    $.ajax({
		        method:'POST',
		        url:'{$router->makeUrl("users/login")}',
		        data: {
		            bday: bday,
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

		function printDeadlines(){
			var print = '<span>'
		    dlAr = {$deadlines|json_encode}
		    $.each(dlAr, function(key, date){
		    	if(key < dlAr.length-1)
		    		print += moment(date.value).format('Do MMMM YYYY').replace('.', '')+', ';
		    	else
		    		print += moment(date.value).format('Do MMMM YYYY').replace('.', '');
		    })

		    print += '</span>'

		    $('.dl-list').html(print);
		}

		printDeadlines();

		$( document ).ready(function() {
			var canGo;
			var deadlines = $('form').find('input[type="checkbox"]');
			var bday_cred = $('form').find('input[name="bday"]').val();
	    	var pass_cred = $('form').find('input[name="pass"]').val();

			$('.loading').remove();
		    $('.login-button').click(function(){
		    	canGo = true;

				if(!$(deadlines).prop('checked')){
					toastr.error('Nie zostały zaznaczone wszystkie terminy!')
					canGo = false;
				}
				if(canGo){
					login(bday_cred, pass_cred);
				}
		    })
		});
	</script>


{include file="../footer.html.php"}