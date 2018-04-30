<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_menu');
		$this->load->model('m_kategori');
		$this->load->library('upload');
	}


	function index(){
		//$x['kat']=$this->m_kategori->get_all_kategori();
		$x['data']=$this->m_menu->hot_promo();
		$this->load->view('mobile/v_home',$x);
	}

}