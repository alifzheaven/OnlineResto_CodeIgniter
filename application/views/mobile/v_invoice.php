<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
		<meta name="keywords" content="M-Food by Mfikri.com">
		<meta name="author" content="M Fikri Setiadi">
		<meta name="description" content="M-Food by Mfikri.com">
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

		<title>Invoice</title>
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
					Invoice
				</div>
			</div>
			<div id="content">
				<?php 
					$b=$data->row_array();
				?>
				<article>
					
					<div class="prod-single-content">
						<table style="border:none;padding:0px;font-size:3px;">
							<tr style="background-color:#fff;">
								<td>No Invoice</td>
								<td>:</td>
								<td><?php echo $b['inv_no']?></td>
							</tr>
							<tr style="background-color:#fff;">
								<td>Tanggal</td>
								<td>:</td>
								<td><?php echo $b['tanggal']?></td>
							</tr>
							<tr style="background-color:#fff;">
								<td>Customer</td>
								<td>:</td>
								<td><?php echo $b['inv_plg_nama']?></td>
							</tr>
							<?php if($b['inv_rek_id']=='COD'):?>
							<tr style="background-color:#fff;">
								<td>Pembayaran</td>
								<td>:</td>
								<td><?php echo $b['inv_rek_id']?></td>
							</tr>
							<?php else:?>
							<tr style="background-color:#fff;">
								<td>Pembayaran</td>
								<td>:</td>
								<td><?php echo 'Transfer Bank '.$b['inv_rek_bank']?></td>
							</tr>
							<tr style="background-color:#fff;">
								<td>No Rekening</td>
								<td>:</td>
								<td><?php echo $b['inv_rek_no']?></td>
							</tr>
							<tr style="background-color:#fff;">
								<td>Atas Nama</td>
								<td>:</td>
								<td><?php echo $b['inv_rek_nama']?></td>
							</tr>
							<?php endif;?>
							<tr style="background-color:#fff;">
								<td>Status Order</td>
								<td>:</td>
								<td><?php echo $b['inv_status']?></td>
							</tr>
						</table>
						<table style="width:100%;border:none;padding:0px;">
							<thead>
							<tr>
								<th style="text-align:center;">Menu</th>
								<th style="text-align:center;">Harga</th>
								<th style="text-align:center;">Porsi</th>
								<th style="text-align:center;">Subtotal</th>
							</tr>
							<thead>
							<tbody>
							<?php foreach ($data->result_array() as $a) {
								$menu=$a['detail_menu_nama'];
								$harga=$a['detail_harjul'];
								$porsi=$a['detail_porsi'];
								$subtotal=$a['detail_subtotal'];
							?>
								<tr>
									<td><?php echo $menu;?></td>
									<td style="text-align:center;"><?php echo number_format($harga);?></td>
									<td style="text-align:center;"><?php echo $porsi;?></td>
									<td style="text-align:center;"><?php echo number_format($subtotal);?></td>
								</tr>
							<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3">Total</td>
									<td style="text-align:center;"><?php echo number_format($b['inv_total'])?></td>
								</tr>
							</tfoot>
						</table>
	
						</form>
					</div>
					<div class="notifications info">
						<p style="text-align:justify;">Silahkan Print Screen Invoice Anda. Jika pembayaran melalui transfer bank, silahkan bayar sesuai dengan nominal yang tertera pada invoice.</p>
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