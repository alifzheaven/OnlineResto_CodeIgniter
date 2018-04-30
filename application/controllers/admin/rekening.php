<?php
class Rekening extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_rekening');
		$this->load->library('upload');
		$this->load->model('m_pengguna');
	}


	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['data']=$this->m_rekening->get_all_rekening();
		$this->load->view('admin/v_rekening',$x);
	}

	function simpan_rekening(){
				$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	            $config['upload_path'] = './assets/img/'; //path folder
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
	                        $norek=str_replace("'", "", $this->input->post('norek'));
	                        $bank=str_replace("'", "", $this->input->post('bank'));
	                        $nama=str_replace("'", "", $this->input->post('nama'));
	                        $cabang=str_replace("'", "", $this->input->post('cabang'));
                           	$kode=$this->m_rekening->get_rek_id();

	               			$this->m_rekening->simpan_rekening($kode,$nama,$norek,$bank,$cabang,$gambar);
	                    	echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Rekening <b>'.$bank.'</b> Berhasil ditambahkan ke database.</div>');
	               			redirect('admin/rekening');

	                }else{
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Rekening tidak dapat ditambahkan, file gambar yang Anda masukkan terlalu besar.</div>');
	                   	redirect('admin/rekening');
	                }
	                 
	            }else{
	            	redirect('admin/rekening');
	            } 

	}

	function update_rekening(){
				$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	            $config['upload_path'] = './assets/img/'; //path folder
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
	                        $norek=str_replace("'", "", $this->input->post('norek'));
	                        $bank=str_replace("'", "", $this->input->post('bank'));
	                        $nama=str_replace("'", "", $this->input->post('nama'));
	                        $cabang=str_replace("'", "", $this->input->post('cabang'));

                            $this->m_rekening->update_rekening($kode,$nama,$norek,$bank,$cabang,$gambar);
	                    	echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Rekening <b>'.$bank.'</b> Berhasil di update.</div>');
	               			redirect('admin/rekening');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Rekening tidak dapat di update, file gambar yang Anda masukkan terlalu besar.</div>');
	                   	redirect('admin/rekening');
	                }
	                 
	            }else{
	            	$kode=str_replace("'", "", $this->input->post('kode'));
	                $norek=str_replace("'", "", $this->input->post('norek'));
	                $bank=str_replace("'", "", $this->input->post('bank'));
	                $nama=str_replace("'", "", $this->input->post('nama'));
	                $cabang=str_replace("'", "", $this->input->post('cabang'));

                    $this->m_rekening->update_rekening_tanpa_logo($kode,$nama,$norek,$bank,$cabang);
	                echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Rekening <b>'.$bank.'</b> Berhasil di update.</div>');
	               	redirect('admin/rekening');
	            } 

	}

	function hapus_rekening(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$this->m_rekening->hapus_rekening($kode);
	    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Rekening <b>'.$nama.'</b> Berhasil dihapus dari database.</div>');
	    redirect('admin/rekening');
	}

	


}