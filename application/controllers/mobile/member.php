<?php
class Member extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pelanggan');
		$this->load->library('upload');
	}


	function index(){
		
		$this->load->view('mobile/v_login');
	}

    function register(){
        $this->load->view('mobile/v_register');
    }
    function simpan_pelanggan(){

        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
                $config['upload_path'] = './assets/images/'; //path folder
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
                            $nama=strip_tags(str_replace("'", "", $this->input->post('nama')));
                            $alamat=strip_tags(str_replace("'", "", $this->input->post('alamat')));
                            $jenkel=strip_tags(str_replace("'", "", $this->input->post('jenkel')));
                            $kontak=strip_tags(str_replace("'", "", $this->input->post('kontak')));
                            $email=strip_tags(str_replace("'", "", $this->input->post('email')));
                            $facebook=strip_tags(str_replace("'", "", $this->input->post('facebook')));
                            $instagram=strip_tags(str_replace("'", "", $this->input->post('instagram')));
                            $line=strip_tags(str_replace("'", "", $this->input->post('line')));
                            $whatapp=strip_tags(str_replace("'", "", $this->input->post('whatapp')));
                            $path=strip_tags(str_replace("'", "", $this->input->post('path')));
                            $pass=strip_tags(str_replace("'", "", $this->input->post('pass')));
                            $pass2=strip_tags(str_replace("'", "", $this->input->post('pass2')));
                            if ($pass <> $pass2) {
                                echo $this->session->set_flashdata('msg','<div class="notifications warning">Password dan Ulangi Password yang Anda masukan tidak sama.</div>');
                                redirect('mobile/member/register');
                            }else{
                                $this->m_pelanggan->simpan_pelanggan_dengan_gambar($nama,$alamat,$jenkel,$kontak,$email,$facebook,$instagram,$line,$whatapp,$path,$pass,$gambar);
                                echo $this->session->set_flashdata('msg','<div class="notifications success">Data <b>'.$nama.'</b> Berhasil di simpan ke database.</div>');
                                redirect('mobile/member');
                            }
                        
                    }else{
                        echo $this->session->set_flashdata('msg','<div class="notifications error">Data tidak dapat di simpan, file gambar yang Anda masukkan terlalu besar.</div>');
                        redirect('mobile/member/register');
                    }
        
                }else{
                    $nama=strip_tags(str_replace("'", "", $this->input->post('nama')));
                    $alamat=strip_tags(str_replace("'", "", $this->input->post('alamat')));
                    $jenkel=strip_tags(str_replace("'", "", $this->input->post('jenkel')));
                    $kontak=strip_tags(str_replace("'", "", $this->input->post('kontak')));
                    $email=strip_tags(str_replace("'", "", $this->input->post('email')));
                    $facebook=strip_tags(str_replace("'", "", $this->input->post('facebook')));
                    $instagram=strip_tags(str_replace("'", "", $this->input->post('instagram')));
                    $line=strip_tags(str_replace("'", "", $this->input->post('line')));
                    $whatapp=strip_tags(str_replace("'", "", $this->input->post('whatapp')));
                    $path=strip_tags(str_replace("'", "", $this->input->post('path')));
                    $pass=strip_tags(str_replace("'", "", $this->input->post('pass')));
                    $pass2=strip_tags(str_replace("'", "", $this->input->post('pass2')));
                    if ($pass <> $pass2) {
                        echo $this->session->set_flashdata('msg','<div class="notifications warning">Password dan Ulangi Password yang Anda masukan tidak sama.</div>');
                        redirect('mobile/member/register');
                    }else{
                        $this->m_pelanggan->simpan_pelanggan_tanpa_gambar($nama,$alamat,$jenkel,$kontak,$email,$facebook,$instagram,$line,$whatapp,$path,$pass);
                        echo $this->session->set_flashdata('msg','<div class="notifications success">Data <b>'.$nama.'</b> Berhasil di simpan ke database.</div>');
                        redirect('mobile/member');
                    }
                } 

        
    }

	function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('email')));
        $password=strip_tags(str_replace("'", "", $this->input->post('pass')));
        $u=$username;
        $p=$password;
        $cadmin=$this->m_pelanggan->cek_pelanggan($u,$p);
        if($cadmin->num_rows > 0){
         $this->session->set_userdata('online',true);
         $this->session->set_userdata('pengguna',$u);
         $this->session->set_userdata('hakakses',3);
         $xcadmin=$cadmin->row_array();
         $this->session->set_userdata('nama_pel',$xcadmin['plg_nama']); 
         $this->session->set_userdata('kopel',$xcadmin['plg_id']); 
        }else{
                $this->session->set_userdata('online',false);
        }
        if($this->session->userdata('online')==true){
            redirect('mobile/member/berhasillogin');
        }else{
            redirect('mobile/member/gagallogin');
        }
    }

    function berhasillogin(){
            if(empty($this->cart->total_items())){
                $kopel=$this->session->userdata('kopel');
                $this->db->query("update tbl_pelanggan set plg_status='1' where plg_id='$kopel'");
                redirect('mobile/home');
            }else{
                redirect('mobile/menu/cart');
            }
            
    }

    function gagallogin(){
            $url=base_url('mobile/member');
            echo $this->session->set_flashdata('msg','<div class="notifications error"><i class="fa fa-exclamation-circle"></i> Email atau Password yang anda masukan salah. Mohon Check Kembali!</div>');
            redirect($url);
    }
    
    function logout(){
            $kopel=$this->session->userdata('kopel');
            $this->db->query("update tbl_pelanggan set plg_status='0' where plg_id='$kopel'");
            $this->session->sess_destroy();
            $url=base_url('mobile/home');
            redirect($url);
    }


}