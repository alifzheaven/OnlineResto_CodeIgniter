<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Orders</title>

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
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/DataTables/jquery.dataTables.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/DataTables/extensions/dataTables.colVis.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/DataTables/extensions/dataTables.tableTools.css'?>" />
		<!-- END STYLESHEETS -->

	</head>
	<body class="menubar-hoverable header-fixed ">

		<?php 
			$this->load->view('admin/v_header');
		?>

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">

			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
							<h2><span class="fa fa-cart-arrow-down"></span> Data Order</h2>
					</div>
						<?php echo $this->session->flashdata('msg');?>
				</section>

				<!-- BEGIN TABLE HOVER -->
				<section class="style-default-bright" style="margin-top:0px;">
			
					
					<div class="section-body">	
						<div class="row">
							
							<table class="table table-hover" id="datatable1">
							<thead>
								<tr>
									<th>No Invoice</th>
									<th>Tanggal</th>
									<th>Pelanggan</th>
									<th>Total</th>
									<th>Metode Pembayaran</th>
									<th>Status Order</th>	
									<th class="text-right">Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$no=0;
								foreach ($data->result_array() as $a) {
									$no++;
									$id=$a['inv_no'];
									$tanggal=$a['inv_tanggal'];
									$plg_id=$a['inv_plg_id'];
									$plg_nama=$a['inv_plg_nama'];
									$status=$a['inv_status'];
									$rek_id=$a['inv_rek_id'];
									$rek_bank=$a['inv_rek_bank'];
									$total=$a['inv_total'];	
								
							?>
								<tr>
									<td><?php echo $id;?></td>
									<td><?php echo $tanggal;?></td>
									<td><?php echo $plg_nama;?></td>
									<td><?php echo number_format($total);?></td>
									<?php if($rek_id=='COD'):?>
										<td><?php echo $rek_id;?></td>
									<?php else:?>
										<td><?php echo 'Transfer Bank '.$rek_bank;?></td>
									<?php endif;?>
									<td><?php echo $status;?></td>
									<td class="text-right">
										<a href="#" class="btn btn-icon-toggle" title="Update Status Order" data-toggle="modal" data-target="#modal_edit_pengguna<?php echo $id;?>"><i class="fa fa-pencil"></i></a>
										<a href="#" class="btn btn-icon-toggle" title="Detail Order" data-toggle="modal" data-target="#modal_detail<?php echo $id;?>"><i class="fa fa-eye"></i></a>
										<a href="#" class="btn btn-icon-toggle" title="Batalkan Order" data-toggle="modal" data-target="#modal_hapus_pengguna<?php echo $id;?>"><i class="fa fa-close"></i></a>
									</td>
								</tr>

							<?php } ?>
								
							</tbody>
						  </table>

						</div>
					</div><!--end .section-body -->

					
				</section>
				<!-- END TABLE HOVER -->

				

			</div><!--end #content-->
			<!-- END CONTENT -->

			<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN DASHBOARD -->
						<li>
							<a href="<?php echo base_url().'admin/dashboard'?>" >
								<div class="gui-icon"><i class="fa fa-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->

						<li>
							<a href="<?php echo base_url().'admin/pengguna'?>">
								<div class="gui-icon"><i class="fa fa-user"></i></div>
								<span class="title">Pengguna</span>
							</a>
						</li>

						<li>
							<a href="<?php echo base_url().'admin/menu'?>">
								<div class="gui-icon"><i class="fa fa-cutlery"></i></div>
								<span class="title">Menu</span>
							</a>
						</li>

						<li>
							<a href="<?php echo base_url().'admin/pelanggan'?>">
								<div class="gui-icon"><i class="fa fa-users"></i></div>
								<span class="title">Pelanggan</span>
							</a>
						</li>

						<li>
							<a href="<?php echo base_url().'admin/order'?>" class="active">
								<div class="gui-icon"><i class="fa fa-cart-arrow-down"></i></div>
								<span class="title">Order</span>
							</a>
						</li>

						<li>
							<a href="<?php echo base_url().'admin/rekening'?>">
								<div class="gui-icon"><i class="fa fa-credit-card"></i></div>
								<span class="title">Rekening</span>
							</a>
						</li>

						<li>
							<a href="<?php echo base_url().'admin/konfirmasi'?>">
								<div class="gui-icon"><i class="fa fa-exchange"></i></div>
								<span class="title">Konfirmasi</span>
							</a>
						</li>

						<li>
							<a href="<?php echo base_url().'admin/gallery'?>">
								<div class="gui-icon"><i class="fa fa-image"></i></div>
								<span class="title">Gallery</span>
							</a>
						</li>

						<!-- BEGIN EMAIL -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="fa fa-cogs"></i></div>
								<span class="title">Pengaturan</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="<?php echo base_url().'admin/status'?>" ><span class="title">Status Order</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END EMAIL -->


					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->

					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75">&copy; <?php echo '2017';?></span> <strong>Mfikri.com</strong>
						</small>
					</div>
				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->

		</div><!--end #base-->
		<!-- END BASE -->


		<!-- ============ MODAL EDIT PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['inv_no'];
					$tanggal=$a['inv_tanggal'];
					$plg_id=$a['inv_plg_id'];
					$plg_nama=$a['inv_plg_nama'];
					$status=$a['inv_status'];
					$rek_id=$a['inv_rek_id'];
					$total=$a['inv_total'];
					$rek_bank=$a['inv_rek_bank'];
								
			?>
			<div class="modal fade" id="modal_detail<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">#<?php echo $id;?></h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/order/update_order'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<div class="col-sm-12">
											<table>
												<tr>
													<td style="width:120px;">Tanggal</td>
													<td>:</td>
													<td><?php echo $tanggal;?></td>
												</tr>
												<tr>
													<td>Pelanggan</td>
													<td>:</td>
													<td><?php echo $plg_nama;?></td>
												</tr>
												<tr>
													<td>Status Order</td>
													<td>:</td>
													<td><?php echo $status;?></td>
												</tr>
												<?php if($rek_id=='COD'):?>
												<tr>
													<td>Pembayaran</td>
													<td>:</td>
													<td><?php echo $rek_id;?></td>
												</tr>
												<?php else:?>
												<tr>
													<td>Pembayaran</td>
													<td>:</td>
													<td><?php echo 'Transfer Bank '.$rek_bank;?></td>
												</tr>
												<?php endif;?>
											</table><br/>
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Menu</th>
														<th style="text-align:center;">Harga</th>
														<th style="text-align:center;">Porsi</th>
														<th style="text-align:center;">Subtotal</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$query=$this->db->query("SELECT * FROM tbl_detail WHERE detail_inv_no='$id'");
														foreach ($query->result_array() as $j) {
															$menu_nama=$j['detail_menu_nama'];
															$menu_harjul=$j['detail_harjul'];
															$menu_porsi=$j['detail_porsi'];
															$menu_subtotal=$j['detail_subtotal'];
														
													?>
													<tr>
														<td><?php echo $menu_nama;?></td>
														<td style="text-align:center;"><?php echo number_format($menu_harjul);?></td>
														<td style="text-align:center;"><?php echo $menu_porsi;?></td>
														<td style="text-align:center;"><?php echo number_format($menu_subtotal);?></td>
													</tr>
													<?php } ?>
												</tbody>
												<tfoot>
													<tr>
														<td colspan="3">Total</td>
														<td style="text-align:center;"><?php echo number_format($total);?></td>
													</tr>
												</tfoot>
												
											</table>
										</div>
									</div>
									
									
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Update</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>


			<!-- ============ MODAL EDIT PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['inv_no'];
					$tanggal=$a['inv_tanggal'];
					$plg_id=$a['inv_plg_id'];
					$plg_nama=$a['inv_plg_nama'];
					$status=$a['inv_status'];
					$rek_id=$a['inv_rek_id'];
					$total=$a['inv_total'];

								
			?>
			<div class="modal fade" id="modal_edit_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Update Status Order</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/order/update_order'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Pilih</label>
										<input type="hidden" name="kode" value="<?php echo $id;?>">
										<div class="col-sm-8">
											<select name="status" class="form-control" id="regular13" required>
												<?php foreach ($stts->result_array() as $st) {
													$st_id=$st['status_id'];
													$st_nm=$st['status_nama'];
												?>
												<option value="<?php echo $st_nm;?>"><?php echo $st_nm;?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									
									
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Update</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>

			<!-- ============ MODAL HAPUS PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['inv_no'];
					$tanggal=$a['inv_tanggal'];
					$plg_id=$a['inv_plg_id'];
					$plg_nama=$a['inv_plg_nama'];
					$status=$a['inv_status'];
					$rek_id=$a['inv_rek_id'];
					$total=$a['inv_total'];
								
			?>
			<div class="modal fade" id="modal_hapus_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Hapus Kategori</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/order/hapus_order'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-2 control-label"></label>
										<div class="col-sm-8">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<p>Apakah Anda yakin mau menghapus data <b><?php echo $id;?></b> ?</p>
										</div>
									</div>
	
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-trash"></span> Hapus</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>

		<!-- BEGIN JAVASCRIPT -->
		<script src="<?php echo base_url().'assets/js/jquery/jquery-1.11.2.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/jquery/jquery-migrate-1.2.1.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/bootstrap/bootstrap.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/spin/spin.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/autosize/jquery.autosize.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/DataTables/jquery.dataTables.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/DataTables/extensions/ColVis/js/dataTables.colVis.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/nanoscroller/jquery.nanoscroller.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/App.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppNavigation.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppOffcanvas.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppCard.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppForm.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppNavSearch.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppVendor.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/core/DemoTableDynamic.js'?>"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
