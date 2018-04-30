<?php
class Gallery extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_gallery');
	}

	function index(){
		$x['data']=$this->m_gallery->get_all_gallery();
		$this->load->view('mobile/v_gallery',$x);
	}
}