<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
		<meta name="keywords" content="M-Food by Mfikri.com">
		<meta name="author" content="M Fikri Setiadi">
		<meta name="description" content="M-Food by Mfikri.com">
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

		<title>Rekening Bank</title>
		<link href="<?php echo base_url().'assets/img/logo.png'?>" rel="shortcut icon" type="image/x-icon">

		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'mobile/css/jquery.mmenu.all.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'mobile/css/style.css'?>" />

		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
		<link rel="apple-touch-startup-image" href="img/apple-touch-startup-image.png">
		
		<script type="text/javascript" src="<?php echo base_url().'mobile/js/jquery.min.js'?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'mobile/js/jquery.mmenu.min.all.js'?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'mobile/js/jquery.easy-pie-chart.js'?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'mobile/js/o-script.js'?>"></script>
		
	</head>
	<body class="o-page" style="background-color:#fff;">
		<div id="page">
			<div id="header">
				<div class="header-content">
					<a href="#menu" class="p-link-home"><i class="fa fa-bars"></i></a>
					<a href="javascript:history.back();" class="p-link-back"><i class="fa fa-arrow-left"></i></a>
				</div>
				</div>
			</div>
			<div class="bannerPane banner-bg">
				<div class="overlay"></div>
				<div class="s-banner-content">
					Rekening Bank
				</div>
			</div>
			<div id="content">
				
				<article>
					
					<div class="prod-single-content">
						<table style="width:100%">
							<thead>
							<tr>
								<th style="text-align:left;">Bank</th>
								<th style="text-align:center;">Aksi</th>
	
							</tr>
							<thead>
							<tbody>
							
							<?php 
								foreach ($data->result_array() as $i): 
									$id=$i['rek_id'];
									$rek_no=$i['rek_no'];
									$rek_nama=$i['rek_nama'];
									$rek_bank=$i['rek_bank'];
									$rek_cabang=$i['rek_cabang'];
									$rek_logo=$i['rek_logo'];

							?>
								<tr>
									<td><img src="<?php echo base_url().'assets/img/'.$rek_logo?>"/></td>
									<td style="text-align:center;vertical-align:middle;"><a href="<?php echo base_url().'mobile/menu/set_pembayaran/'.$id;?>" class="o-buttons blue">Pilih</a></td>
								</tr>
							
							<?php endforeach; ?>
							</tbody>
							
						</table>
		
					</div>
					<div class="notifications info">
						<p style="text-align:justify;">Jika jumlah porsi yang Anda inginkan lebih dari satu. Tambahkan jumlah posrsi sesuai dengan yang Anda inginkan dan klik tombol <b>Update Keranjang</b>.</p> <p style="text-align:justify;">Jika masih ada lagi menu yang akan Anda beli selain dari tabel diatas. Klik <a href="<?php echo base_url().'mobile/menu'?>"><b>disini</b></a> untuk memilih menu lainnya.</p>
					</div>
				</article>

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
						<a href="<?php echo base_url().'mobile/home'?>">
							<i class="fa fa-home"></i>Home
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

	
	</body>
</html>