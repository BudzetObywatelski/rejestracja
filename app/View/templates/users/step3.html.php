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
			                            <li><a>Terminy</a></li>
			                            <li><a href="#personalData" data-toggle="tab">Dane osobowe</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane active" id="personalData">
		                                <div class="row">
		                                    <h4 class="info-text"> <b>Prosimy o podanie następujących informacji:</b></h4>
		                                    <div class="col-sm-6">
		                                    	<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-envelope"></i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Adres email</label>
			                                          	<input name="email" type="text" class="form-control">
			                                        </div>
												</div>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-mobile"></i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Numer telefonu</label>
			                                          	<input name="phone" type="text" class="form-control">
			                                        </div>
												</div>
		                                    	<label>Płeć</label>
	                                    		<div class="radio">
												    <label>
													    <input type="radio" name="gender" value="male">
												    </label>
												    Mężczyzna
											    </div>
											    <div class="radio">
												    <label>
													    <input type="radio" name="gender" value="female">
												    </label>
												    Kobieta
											    </div>
		                                    </div>
		                                    <div class="col-sm-6">
		                                    	<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-birthday-cake"></i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Data urodzenia</label>
			                                          	<input name="bday" type="date" class="form-control" value="2000-01-01">
			                                        </div>
												</div>
		                                    	<label>Wykształcenie</label>
		                                    	<div class="radio">
												    <label>
													    <input type="radio" name="education" value="group1">
												    </label>
												    Podstawowe, gimnazjalne, inne
											    </div>
											    <div class="radio">
												    <label>
													    <input type="radio" name="education" value="group2">
												    </label>
												    Średnie, policealne, kolegium, zawodowe
											    </div>
											    <div class="radio">
												    <label>
													    <input type="radio" name="education" value="group3">
												    </label>
												    Wyższe
											    </div>												
		                                    </div>
		                                    <div class="col-sm-12">
		                                    	<div class="form-group">
		                                            <label>Specjalne potrzeby dotyczące diety</label>
		                                            <textarea class="form-control" placeholder="" rows="3"></textarea>
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-12">
		                                    	<div class="checkbox">
												    <label>
													    <input type="checkbox" name="confirm-privacy">
												    </label>
												    Wyrażam zgodę na przetwarzanie moich danych osobowych na potrzeby organizacji panelu obywatelskiego w&nbsp;Lublinie, zgodnie z&nbps;ustawą xxyyzz
											    </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input type='button' class='btn btn-fill btn-success btn-wd' name='finish' value='Finish' />
	                                </div>
	                                <div class="pull-left">
	                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />

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
{include file="../footer.html.php"}