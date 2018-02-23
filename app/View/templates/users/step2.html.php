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
									<ul>
			                            <li><a href="#">Logowanie</a></li>
			                            <li><a href="#schedule" data-toggle="tab">Terminy</a></li>
			                            <li><a href="#">Dane osobowe</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="schedule">
		                                <h4 class="info-text"><h5><b>Potwierdzenie możliwości wzięcia udziału w&nbsp;panelu obywatelskim</b></h5> Mogę wziąć udział w&nbsp;spotkaniach panelu obywatelskiego, które odbędą się w&nbsp;następujących terminach </h4>
		                                <div class="row">
		                                    <div class="col-sm-10 col-sm-offset-1">
		                                        <div class="col-sm-4 important-checkboxes">
		                                            <div class="checkbox">
													    <label>
														    <input type="checkbox" name="termin">
													    </label>
													    24.03
												    </div>
												    <div class="checkbox">
													    <label>
														    <input type="checkbox" name="termin">
													    </label>
													    07.04
												    </div>
												    <div class="checkbox">
													    <label>
														    <input type="checkbox" name="termin">
													    </label>
													    14.04
												    </div>
												    <div class="checkbox">
													    <label>
														    <input type="checkbox" name="termin">
													    </label>
													    21.04
												    </div>
												    <div class="checkbox">
													    <label>
														    <input type="checkbox" name="termin">
													    </label>
													    28.04
												    </div>
												    <div class="checkbox">
													    <label>
														    <input type="checkbox" name="termin">
													    </label>
													    12.05
												    </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input type='button' class='btn btn-fill btn-success btn-wd' name='next' value='Next' />
	                                </div>
	                                <div class="pull-left">
	                                    <input type='button' class='btn btn-fill btn-default btn-wd' name='previous' value='Previous' />

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