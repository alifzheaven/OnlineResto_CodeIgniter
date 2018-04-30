<?php
class Status extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_status');
		$this->load->model('m_pengguna');
	}

	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['data']=$this->m_status->get_all_status();
		$this->load->view('admin/v_status',$x);
	}
	function simpan_status(){
		$status=str_replace("'", "", $this->input->post('status'));
		$this->m_status->simpan_status($status);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Status Order <b>'.$status.'</b> Berhasil ditambahkan ke database.</div>');
	    redirect('admin/status');
	}

	function update_status(){
		$kode=$this->input->post('kode');
		$status=str_replace("'", "", $this->input->post('status'));
		$this->m_status->update_status($kode,$status);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Status Order <b>'.$status.'</b> Berhasil diupdate.</div>');
	    redirect('admin/status');
	}
	function hapus_status(){
		$kode=$this->input->post('kode');
		$status=str_replace("'", "", $this->input->post('status'));
		$this->m_status->hapus_status($kode);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Status Order <b>'.$status.'</b> Berhasil dihapus.</div>');
	    redirect('admin/status');
	}


}