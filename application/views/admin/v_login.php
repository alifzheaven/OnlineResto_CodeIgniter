<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="M-Food by Mfikri.com">
		<meta name="author" content="M Fikri Setiadi">
		<meta name="description" content="M-Food by Mfikri.com">
		<link rel="shorcut icon" href="<?php echo base_url().'assets/img/logo.png'?>">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href="<?php echo base_url().'assets/style-material.css'?>" rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/materialadmin.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/material-design-iconic-font.min.css'?>" />
		<!-- END STYLESHEETS -->

		
	</head>
	<body class="menubar-hoverable header-fixed ">

		<!-- BEGIN LOGIN SECTION -->
		<section class="section-account">
			<div class="img-backdrop" style="background-image: url(<?php echo base_url().'assets/img/img16.jpg'?>)"></div>
			<div class="spacer"></div>
			<div class="card contain-sm style-transparent">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<br/>
							<span class="text-lg text-bold text-primary">LOGIN ADMINISTRATOR</span>
							<br/><br/>
							<?php echo $this->session->flashdata('msg');?>
							<form class="form floating-label" action="<?php echo base_url().'administrator/auth'?>" accept-charset="utf-8" method="post">
								<div class="form-group">
									<input type="text" class="form-control" id="username" name="username" required>
									<label for="username">Username</label>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="password" name="password" required>
									<label for="password">Password</label>
									
								</div>
								<br/>
								<div class="row">
									<div class="col-xs-6 text-left">
										<div class="checkbox checkbox-inline checkbox-styled">
											<label>
												<input type="checkbox"> <span>Tetap Masuk</span>
											</label>
										</div>
									</div><!--end .col -->
									<div class="col-xs-6 text-right">
										<button class="btn btn-primary btn-raised" type="submit"><span class="fa fa-lock"></span> Login</button>
									</div><!--end .col -->
								</div><!--end .row -->
							</form>
						</div><!--end .col -->
						
							</div><!--end .row -->
						</div><!--end .card-body -->
					</div><!--end .card -->
				</section>
				<!-- END LOGIN SECTION -->

				<!-- BEGIN JAVASCRIPT -->
				<script src="<?php echo base_url().'assets/js/jquery/jquery-1.11.2.min.js'?>"></script>
				<script src="<?php echo base_url().'assets/js/jquery/jquery-migrate-1.2.1.min.js'?>"></script>
				<script src="<?php echo base_url().'assets/js/bootstrap/bootstrap.min.js'?>"></script>
				<script src="<?php echo base_url().'assets/js/spin/spin.min.js'?>"></script>
				<script src="<?php echo base_url().'assets/js/autosize/jquery.autosize.min.js'?>"></script>
				<script src="<?php echo base_url().'assets/js/nanoscroller/jquery.nanoscroller.min.js'?>"></script>
				<script src="<?php echo base_url().'assets/js/source/App.js'?>"></script>
				<script src="<?php echo base_url().'assets/js/source/AppNavigation.js'?>"></script>
				<script src="<?php echo base_url().'assets/js/source/AppOffcanvas.js'?>"></script>
				<script src="<?php echo base_url().'assets/js/source/AppCard.js'?>"></script>
				<script src="<?php echo base_url().'assets/js/source/AppForm.js'?>"></script>
				<script src="<?php echo base_url().'assets/js/source/AppNavSearch.js'?>"></script>
				<script src="<?php echo base_url().'assets/js/source/AppVendor.js'?>"></script>
				<!-- END JAVASCRIPT -->

			</body>
		</html>
