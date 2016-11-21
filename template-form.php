<?php
/**
 * Template Name: Multi-Step Form Template
 */
?>

<?php 
	$sidebar_display = get_field('sidebar_display');
	if ( is_active_sidebar( 'sidebar-cta' ) && $sidebar_display == true ) :
		dynamic_sidebar( 'sidebar-cta' );
	endif;
?>


<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

	</div><!-- END container -->
</div><!-- END wrap -->


<!--<section id="multi-step-form">
	<div class="container">
		<div class="row">

		<form action="https://secureform.luxsci.com/perl/post/13782-4299-r7jw" method="post" class="j-forms j-multistep col-xs-12 well" id="j-multistep" novalidate>
			<div class="content">

				<!--
					Personal Information
				
				<fieldset>
					<div class="row">
						<div class="col-xs-12">
							<small class="pull-right">Step 1/2</small>
							<p style="1.3em;">Start Here</p>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-12 col-sm-6 unit">
							<div class="input">
								<label class="icon-right" for="sender_name">
									<i class="fa fa-user"></i>
								</label>
								<input type="text" class="form-control" id="sender_name" name="caller_name" placeholder="Full Name">
							</div>
						</div>
						<div class="form-group col-xs-12 col-sm-6 unit">
							<div class="input">
								<label class="icon-right" for="phone">
									<i class="fa fa-phone"></i>
								</label>
								<input type="text" class="form-control" id="phone" name="phone_number" placeholder="(xxx) xxx-xxxx">
							</div>
						</div>
					</div>	
				<div class="row">		
                	<div class="form-group col-xs-12  col-sm-6 unit">
						<div class="input">
							<label class="icon-right" for="email">
								<i class="fa fa-envelope-o"></i>
							</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Email">
						</div>
                    </div>						
	                	<div class="form-group col-xs-12  col-sm-6 unit">
							<div class="input">
								<label class="icon-right" for="drug_choice">
									<i class="fa fa-question"></i>
								</label>
								<input type="text" class="form-control" id="drug_choice" name="custom_drug" placeholder="Drug Of Choice">
							</div>
	                    </div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 check">
							<p style="font-size: 18px;">Have you ever struggled with mental health issues?</p>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<label class="radio">
									<input type="radio" class="mental-health" name="custom_mental_health" value="Yes">
									<i></i>
									Yes
								</label>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<label class="radio">
									<input type="radio" class="mental-health" name="custom_mental_health" value="No">
									<i></i>
									No
								</label>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<label class="radio">
									<input type="radio" class="mental-health" name="custom_mental_health" value="Possibly">
									<i></i>
									Possibly
								</label>
							</div>														
						</div>
					</div>		
										
				</fieldset>




				<!--
					Insurance Information
				
				<fieldset>
					<div class="row">
						<div class="col-xs-12">
							<small class="pull-right">Step 2/2</small>
							<p>Insurance</p>
						</div>
					</div>
					<div class="row">
	                    <div class="form-group col-xs-12 unit">
							<div class="row unit check">
								<div class="col-xs-12">
									<label class="label">What type of insurance do you have?</label>
								</div>
								<div class="col-sm-4 col-xs-12">
									<label class="radio" id="show-elements-PPO">
										<input type="radio" class="form-control" name="custom_insurance" id="radio-enable-PPO" value="PPO">
										<i></i>
										PPO
									</label>
								</div>
								<div class="col-sm-4 col-xs-12">
									<label class="radio" id="show-elements-HMO">
										<input type="radio" class="form-control" name="custom_insurance" id="radio-enable-HMO" value="HMO">
										<i></i>
										HMO
									</label>
								</div>
								<div class="col-sm-4 col-xs-12">
									<label class="radio" id="show-elements-no">
										<input type="radio" class="form-control" name="custom_insurance" id="radio-enable-no" value="No Insurance">
										<i></i>
										No Insurance
									</label>
								</div>
							</div>

		                    <div id="yes" class="insurance-provider row hidden">
								<div class="insurance-provider unit check">
									<div class="col-xs-12">
										<label for="enable_insurance">Please select insurance provider:</label>
									</div>
								  <div class="row">
								    <div class="form-group col-xs-12 col-sm-6 unit">
								      <div class="input">
								        <label class="icon-right" for="sender_name"><i class="fa fa-user"></i></label>
								        <input class="form-control" name="custom_client_name" type="text" placeholder="Client Name *"> </div>
								    </div>
								    <div class="form-group col-xs-12 col-sm-6 unit">
								      <div class="input">
								        <label class="icon-right" for="date"><i class="fa fa-calendar"></i></label>
								        <input id="date" class="form-control" name="custom_dob" type="text" placeholder="Date Of Birth *"> </div>
								    </div>
								  </div>									
								  <div class="row">
								    <div class="form-group col-xs-12 col-sm-6 unit">
								      <div class="input">
									      <label class="icon-right" for="date"><i class="fa fa-file-text-o"></i></label>
								        <input class="form-control" name="custom_member_id" type="text" placeholder="Member ID *"> 
								        </div>
								    </div>
								    <div class="form-group col-xs-12 col-sm-6 unit">
								      <div class="input">
									      <label class="icon-right" for="date"><i class="fa fa-users"></i></label>
								        <input class="form-control" name="custom_group_number" type="text" placeholder="Group Number *"> 
								        </div>
								    </div>
								  </div>									
									<div class="col-md-4 col-sm-6 col-xs-12">
										<label class="radio">
											<input class="ins-pro form-control" type="radio" name="custom_insurance_provider" value="Aetna">
											<i></i>
											Aetna
										</label>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<label class="radio">
											<input class="ins-pro form-control" type="radio" name="custom_insurance_provider" value="BlueCross BlueShield">
											<i></i>
											BlueCross BlueShield
										</label>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<label class="radio">
											<input class="ins-pro form-control" type="radio" name="custom_insurance_provider" value="Cigna">
											<i></i>
											Cigna
										</label>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<label class="radio">
											<input class="ins-pro form-control" type="radio" name="custom_insurance_provider" value="Humana">
											<i></i>
											Humana
										</label>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<label class="radio">
											<input class="ins-pro form-control" type="radio" name="custom_insurance_provider" value="United Healthcare">
											<i></i>
											United Healthcare
										</label>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<label class="radio">
											<input class="ins-pro form-control" type="radio" name="custom_insurance_provider" value="Other">
											<i></i>
											Other
										</label>
									</div>
								</div>
							</div>

		                    <div id="no" class="no-insurance-provider row hidden">
								<div class="no-insurance unit check">
									<div class="col-xs-12">
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<label class="radio">
											<input class="no-ins form-control" type="radio" name="custom_no_insurance_option" value="I do not have insurance">
											<i></i>
											I do not have insurance
										</label>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<label class="radio">
											<input class="no-ins form-control" type="radio" name="custom_no_insurance_option" value="Private Pay">
											<i></i>
											Private Pay
										</label>
									</div>
									<div class="col-md-4 hidden-sm hidden-xs">
										&nbsp;
									</div>
								</div>
							</div>

						</div>
					</div>
				</fieldset>

			</div>
			<!-- end /.content 

			<div class="footer">
				<button type="submit" class="primary-btn multi-submit-btn pull-right">Send</button>
				<button type="button" class="primary-btn multi-next-btn pull-right">Next</button>
				<button type="button" class="primary-btn multi-prev-btn">Back</button>
			</div>

		</form>

		</div>
	</div>
</section>-->


<?php

  if($primaryBg!=''){
    echo '</section>';
  }

get_template_part('includes/page', 'builder'); ?>