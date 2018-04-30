<?php
class Konfirmasi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_konfirmasi');
		$this->load->library('upload');
	}

	function index(){
		$this->load->view('mobile/v_konfirmasi');
	}
	function simpan_konfirmasi(){
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
                            $no_invoice=strip_tags(str_replace("'", "", $this->input->post('no_invoice')));
                            $nama=strip_tags(str_replace("'", "", $this->input->post('nama')));
                            $bank=strip_tags(str_replace("'", "", $this->input->post('bank')));
                            $jumlah=strip_tags(str_replace("'", "", $this->input->post('jumlah')));
                           	$inv=$this->m_konfirmasi->get_invoice($no_invoice);
                           	if ($inv->num_rows() <= 0) {
                           		echo $this->session->set_flashdata('msg','<div class="notifications error">No Invoice yang Anda Masukan tidak Valid</div>');
                        		redirect('mobile/konfirmasi');
                           	}else{
                           		$this->m_konfirmasi->simpan_konfirmasi($no_invoice,$nama,$bank,$jumlah,$gambar);
                                echo $this->session->set_flashdata('msg','<div class="notifications success">Konfirmasi Berhasil. Kami akan memvalidasi bukti tranfer anda.</div>');
                                redirect('mobile/konfirmasi');
                           	}
                                
                    }else{
                        echo $this->session->set_flashdata('msg','<div class="notifications error">Konfirmasi gagal, file bukti tranfer yang Anda masukkan terlalu besar.</div>');
                        redirect('mobile/konfirmasi');
                    }
        
                }else{
                    redirect('mobile/konfirmasi');
                } 

	}


}