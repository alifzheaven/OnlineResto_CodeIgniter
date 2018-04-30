<?php
class Tracker extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_order');
	}

	function index(){
		$this->load->view('mobile/v_tracking');
	}
	function tracking(){
		$no_invoice=$this->input->post('no_invoice');
		$x['data']=$this->m_order->get_checkout($no_invoice);
		$this->load->view('mobile/v_status_order',$x);
	}

}