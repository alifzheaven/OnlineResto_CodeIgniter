<?php
class Pelanggan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pelanggan');
		$this->load->library('upload');
		$this->load->model('m_pengguna');
	}


	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['data']=$this->m_pelanggan->get_all_pelanggan();
		$this->load->view('admin/v_pelanggan',$x);
	}

	function hapus_pelanggan(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$this->m_pelanggan->hapus_pelanggan($kode);
	    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pelanggan <b>'.$nama.'</b> Berhasil dihapus dari database.</div>');
	    redirect('admin/pelanggan');
	}

}