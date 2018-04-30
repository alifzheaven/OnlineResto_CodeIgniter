<?php
class Myfood extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('online') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_order');
		$this->load->library('upload');
	}

	function index(){
		$kopel=$this->session->userdata('kopel');
		$x['data']=$this->m_order->get_myefood($kopel);
		$this->load->view('mobile/v_myfood',$x);
	}
}