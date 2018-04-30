<!DOCTYPE html>
<html >
	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
		<meta name="keywords" content="M-Food by Mfikri.com">
		<meta name="author" content="M Fikri Setiadi">
		<meta name="description" content="M-Food by Mfikri.com">
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

		<title>Home</title>
		<link href="<?php echo base_url().'assets/img/logo.png'?>" rel="shortcut icon" type="image/x-icon">

		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'mobile/css/jquery.mmenu.all.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'mobile/css/style.css'?>" />
		<link rel='stylesheet' id='camera-css'  href="<?php echo base_url().'mobile/css/camera.css'?>" type='text/css' media='all'> 
		
		
		
		<script type="text/javascript" src="<?php echo base_url().'mobile/js/jquery.min.js'?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'mobile/js/jquery.mmenu.min.all.js'?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'mobile/js/o-script.js'?>"></script>
		
		<script type='text/javascript' src="<?php echo base_url().'mobile/js/slider/jquery.mobile.customized.min.js'?>"></script>
		<script type='text/javascript' src="<?php echo base_url().'mobile/js/slider/jquery.easing.1.3.js'?>"></script> 
		<script type='text/javascript' src="<?php echo base_url().'mobile/js/slider/camera.min.js'?>"></script> 
		
		<script>
			jQuery(function(){
				
				jQuery('#camera_wrap_4').camera({
					height: 'auto',
					loader: 'bar',
					pagination: false,
					thumbnails: false,
					hover: false,
					opacityOnGrid: false
				});

			});
		</script>
	</head>
	<body class="o-page p-home">
		<div id="page">
			<!-- Header -->
			<div id="header">
				<div class="header-content">
					<a href="#menu" class="p-link-home"><i class="fa fa-bars"></i></a>
					<?php if($this->session->userdata('online')==false):?>
						<a href="<?php echo base_url().'mobile/member'?>" class="p-link-back"><i class="fa fa-sign-in"></i></a>
					<?php else:?>
						<a href="<?php echo base_url().'mobile/member/logout'?>" class="p-link-back"><i class="fa fa-sign-out"></i></a>
					<?php endif;?>
				</div>
			</div>
			<!-- Content -->
			<div id="content">
				<div class="home-content">
					<span id="Logo" class="svg">
						<img src="<?php echo base_url().'assets/img/logo.png'?>" />
					</span>
				</div>
				<div class="fluid_container">
					<div class="camera_wrap camera_black_skin camera_emboss pattern_1" id="camera_wrap_4">
						<?php 
							foreach ($data->result_array() as $a) {
								$id=$a['menu_id'];
								$nama=$a['menu_nama'];	
								$deskripsi=$a['menu_deskripsi'];
								$harga_lama=$a['menu_harga_lama'];
								$harga_baru=$a['menu_harga_baru'];
								$like=$a['menu_likes'];
								$kat_id=$a['menu_kategori_id'];
								$kat_nama=$a['menu_kategori_nama'];
								$gambar=$a['menu_gambar'];

							?>
						<div data-thumb="<?php echo base_url().'assets/gambar/'.$gambar;?>" data-src="<?php echo base_url().'assets/gambar/'.$gambar;?>">
							<div class="bannerContent fadeFromBottom">
								<div class="b-c-textpane">
									<h1><?php echo number_format($harga_baru);?></h1>
									<p><a href="<?php echo base_url().'mobile/menu/detail_menu/'.$id;?>" style="color:#fff;text-decoration:none;">Pesan Sekarang</a></p>
									<a href="<?php echo base_url().'mobile/menu'?>" class="home-scl-icon gplus">
										<i class="fa fa-arrow-right"></i>
										<div>Lihat Menu lain nya</div>
									</a>
								</div>
							</div>
						</div>

						<?php }?>
						
					</div><!-- #camera_wrap_3 -->

				</div><!-- .fluid_container -->
				
				<!-- <a href="#" class="home-footer">
					About us
				</a> -->
			</div>
			
			<!-- Menu navigation -->
			<nav id="menu">
				<ul>
					<li class="Selected">
						<a href="#close">
							<i class="fa fa-times-circle"></i>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'mobile/menu/cart'?>">
							<i class="fa fa-shopping-cart"></i>Keranjang Belanja (<?=$this->cart->total_items();?>)
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'mobile/menu/makanan'?>">
							<i class="fa fa-cutlery"></i>Makanan
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'mobile/menu/minuman'?>">
							<i class="fa fa-glass"></i>Minuman
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'mobile/menu/favorite'?>">
							<i class="fa fa-star"></i>Favorite
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'mobile/menu'?>">
							<i class="fa fa-fire"></i>Hot Promo
						</a>
					</li>
					
					<li>
						<a href="<?php echo base_url().'mobile/tracker'?>">
							<i class="fa fa-crosshairs"></i>Tracker
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'mobile/member/register'?>">
							<i class="fa fa-user"></i>Mendaftar
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'mobile/gallery'?>">
							<i class="fa fa-camera-retro"></i>Gallery
						</a>
					</li>
					
					
					<?php if($this->session->userdata('online') == TRUE):?>
					<li>
						<a href="<?php echo base_url().'mobile/konfirmasi'?>">
							<i class="fa fa-exchange"></i>Konfirmasi
						</a>
					</li>
					
					<li>
						<a href="<?php echo base_url().'mobile/myfood'?>">
							<i class="fa fa-cutlery"></i>My Food
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'mobile/member/logout'?>">
							<i class="fa fa-sign-out"></i>Logout
						</a>
					</li>
					<?php else:?>
					<li>
						<a href="<?php echo base_url().'mobile/member'?>">
							<i class="fa fa-sign-in"></i>Login
						</a>
					</li>
					<?php endif;?>
				</ul>
			</nav>
			
		</div>
	</body>
</html>