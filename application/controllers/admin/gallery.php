<?php
class Gallery extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_gallery');
		$this->load->library('upload');
		$this->load->model('m_pengguna');
	}


	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['data']=$this->m_gallery->get_all_gallery();
		$this->load->view('admin/v_gallery',$x);
	}

	function simpan_gallery(){
				$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	            $config['upload_path'] = './assets/galeries/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['max_size'] = '1024'; //maksimum besar file 2M
	            $config['max_width']  = '900'; //lebar maksimum 1288 px
	            $config['max_height']  = '800'; //tinggi maksimu 1000 px
	            $config['file_name'] = $nmfile; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $judul=str_replace("'", "", $this->input->post('judul'));
	                        $deskripsi=str_replace("'", "", $this->input->post('deskripsi'));
	                      
	               			$this->m_gallery->simpan_gallery($judul,$deskripsi,$gambar);
	                    	echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Gambar <b>'.$judul.'</b> Berhasil ditambahkan ke database.</div>');
	               			redirect('admin/gallery');

	                }else{
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Gambar tidak dapat ditambahkan, file gambar yang Anda masukkan terlalu besar.</div>');
	                   	redirect('admin/gallery');
	                }
	                 
	            }else{
	            	redirect('admin/gallery');
	            } 

	}

	function update_gallery(){
				$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	            $config['upload_path'] = './assets/galeries/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['max_size'] = '1024'; //maksimum besar file 2M
	            $config['max_width']  = '900'; //lebar maksimum 1288 px
	            $config['max_height']  = '800'; //tinggi maksimu 1000 px
	            $config['file_name'] = $nmfile; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $kode=str_replace("'", "", $this->input->post('kode'));
	                        $judul=str_replace("'", "", $this->input->post('judul'));
	                        $deskripsi=str_replace("'", "", $this->input->post('deskripsi'));

                            $this->m_gallery->update_gallery($kode,$judul,$deskripsi,$gambar);
	                    	echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Gambar <b>'.$judul.'</b> Berhasil di update.</div>');
	               			redirect('admin/gallery');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Gambar tidak dapat di update, file gambar yang Anda masukkan terlalu besar.</div>');
	                   	redirect('admin/gallery');
	                }
	                 
	            }else{
	            	$kode=str_replace("'", "", $this->input->post('kode'));
	                $judul=str_replace("'", "", $this->input->post('judul'));
	                $deskripsi=str_replace("'", "", $this->input->post('deskripsi'));

                    $this->m_gallery->update_gallery_tanpa_gambar($kode,$judul,$deskripsi);
	                echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Gambar <b>'.$judul.'</b> Berhasil di update.</div>');
	               	redirect('admin/gallery');
	            } 

	}

	function hapus_gallery(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$this->m_gallery->hapus_gallery($kode);
	    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Gambar <b>'.$nama.'</b> Berhasil dihapus dari database.</div>');
	    redirect('admin/gallery');
	}

	


}