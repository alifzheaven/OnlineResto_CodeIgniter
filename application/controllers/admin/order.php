<?php
class Order extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_order');
		$this->load->model('m_status');
		$this->load->model('m_pengguna');
	}

	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['data']=$this->m_order->get_all_order();
		$x['stts']=$this->m_status->get_all_status();
		$this->load->view('admin/v_order',$x);
	}
	
	function update_order(){
		$kode=$this->input->post('kode');
		$status=str_replace("'", "", $this->input->post('status'));
		$this->m_order->update_order($kode,$status);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Status order untuk No Invoice: <b>'.$kode.'</b> Berhasil diupdate.</div>');
	    redirect('admin/order');
	}
	function hapus_order(){
		$kode=$this->input->post('kode');
		$this->m_order->hapus_order($kode);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Order untuk invoice: <b>'.$kode.'</b> Berhasil dihapus.</div>');
	    redirect('admin/order');
	}


}