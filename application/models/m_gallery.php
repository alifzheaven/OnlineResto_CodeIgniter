<?php
class M_gallery extends CI_Model{

	function get_all_gallery(){
		$hsl=$this->db->query("select * from tbl_galeri");
		return $hsl;
	}

	

	function simpan_gallery($judul,$deskripsi,$gambar){
		$hsl=$this->db->query("INSERT INTO tbl_galeri(galeri_judul,galeri_deskripsi,galeri_gambar) VALUES ('$judul','$deskripsi','$gambar')");
		return $hsl;
	}

	function update_gallery($kode,$judul,$deskripsi,$gambar){
		$hsl=$this->db->query("update tbl_galeri set galeri_judul='$judul',galeri_deskripsi='$deskripsi',galeri_gambar='$gambar' where galeri_id='$kode'");
		return $hsl;
	}
	function update_gallery_tanpa_gambar($kode,$judul,$deskripsi){
		$hsl=$this->db->query("update tbl_galeri set galeri_judul='$judul',galeri_deskripsi='$deskripsi' where galeri_id='$kode'");
		return $hsl;
	}
	function hapus_gallery($kode){
		$hsl=$this->db->query("delete from tbl_galeri where galeri_id='$kode'");
		return $hsl;
	}

}