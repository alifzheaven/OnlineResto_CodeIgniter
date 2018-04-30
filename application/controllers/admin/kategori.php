<?php
class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_pengguna');
	}

	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['data']=$this->m_kategori->get_all_kategori();
		$this->load->view('admin/v_kategori',$x);
	}
	function simpan_kategori(){
		$kategori=str_replace("'", "", $this->input->post('kategori'));
		$this->m_kategori->simpan_kategori($kategori);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Kategori <b>'.$kategori.'</b> Berhasil ditambahkan ke database.</div>');
	    redirect('admin/kategori');
	}

	function update_kategori(){
		$kode=$this->input->post('kode');
		$kategori=str_replace("'", "", $this->input->post('kategori'));
		$this->m_kategori->update_kategori($kode,$kategori);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Kategori <b>'.$kategori.'</b> Berhasil diupdate.</div>');
	    redirect('admin/kategori');
	}
	function hapus_kategori(){
		$kode=$this->input->post('kode');
		$kategori=str_replace("'", "", $this->input->post('kategori'));
		$this->m_kategori->hapus_kategori($kode);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Kategori <b>'.$kategori.'</b> Berhasil dihapus.</div>');
	    redirect('admin/kategori');
	}


}