<?php
class M_pelanggan extends CI_Model{

	function get_grafik_pelanggan(){
		$query=$this->db->query("SELECT DATE_FORMAT(plg_register,'%M') AS bulan,COUNT(plg_id) AS total FROM tbl_pelanggan WHERE YEAR(plg_register)=YEAR(CURDATE()) GROUP BY MONTH(plg_register)");

		if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
	}

	function get_all_pelanggan(){
		$hsl=$this->db->query("select * from tbl_pelanggan order by plg_id desc");
		return $hsl;
	}

	function cek_pelanggan($u,$p){
		$hsl=$this->db->query("select * from tbl_pelanggan where plg_email='$u' and plg_password=md5('$p')");
		return $hsl;
	}
	function simpan_pelanggan_dengan_gambar($nama,$alamat,$jenkel,$kontak,$email,$facebook,$instagram,$line,$whatapp,$path,$pass,$gambar){
		$hsl=$this->db->query("INSERT INTO tbl_pelanggan(plg_nama,plg_alamat,plg_jenkel,plg_notelp,plg_email,plg_facebook,plg_instagram,plg_line,plg_whatapp,plg_path,plg_photo,plg_password) VALUES ('$nama','$alamat','$jenkel','$kontak','$email','$facebook','$instagram','$line','$whatapp','$path','$gambar',md5('$pass'))");
		return $hsl;
	}
	function simpan_pelanggan_tanpa_gambar($nama,$alamat,$jenkel,$kontak,$email,$facebook,$instagram,$line,$whatapp,$path,$pass){
		$hsl=$this->db->query("INSERT INTO tbl_pelanggan(plg_nama,plg_alamat,plg_jenkel,plg_notelp,plg_email,plg_facebook,plg_instagram,plg_line,plg_whatapp,plg_path,plg_password) VALUES ('$nama','$alamat','$jenkel','$kontak','$email','$facebook','$instagram','$line','$whatapp','$path',md5('$pass'))");
		return $hsl;
	}
	function hapus_pelanggan($kode){
		$hsl=$this->db->query("delete from tbl_pelanggan where plg_id='$kode'");
		return $hsl;
	}

	function get_all_pelanggan_terbaru(){
		$hsl=$this->db->query("select * from tbl_pelanggan order by plg_id desc");
		return $hsl;
	}

}