<?php
class Konfirmasi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->model('m_konfirmasi');
		$this->load->model('m_order');
	}

	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['data']=$this->m_konfirmasi->get_all_konfirmasi();
		$this->load->view('admin/v_konfirmasi',$x);
	}
	function update_konfirmasi(){
		$kode=$this->input->post('kode');
		$no_invoice=$this->input->post('no_invoice');
		$this->m_konfirmasi->update_konfirmasi($kode,$no_invoice);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Konfirmasi Invoice <b>'.$no_invoice.'</b> Berhasil.</div>');
	    redirect('admin/konfirmasi');
	}
	function hapus_konfirmasi(){
		$kode=$this->input->post('kode');
		$no_invoice=$this->input->post('no_invoice');
		$this->m_konfirmasi->hapus_konfirmasi($kode,$no_invoice);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Konfirmasi Invoice <b>'.$no_invoice.'</b> Tidak Valid.</div>');
	    redirect('admin/konfirmasi');
	}

}