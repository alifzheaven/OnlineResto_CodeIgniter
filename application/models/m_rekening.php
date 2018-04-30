<?php
class M_rekening extends CI_Model{

	function get_all_rekening(){
		$hsl=$this->db->query("select * from tbl_rekening");
		return $hsl;
	}

	function get_rek_id(){
		$q = $this->db->query("SELECT MAX(RIGHT(rek_id,3)) AS kd_max FROM tbl_rekening");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return $kd;
	}

	function simpan_rekening($kode,$nama,$norek,$bank,$cabang,$gambar){
		$hsl=$this->db->query("INSERT INTO tbl_rekening(rek_id,rek_no,rek_nama,rek_bank,rek_cabang,rek_logo) VALUES ('$kode','$norek','$nama','$bank','$cabang','$gambar')");
		return $hsl;
	}

	function update_rekening($kode,$nama,$norek,$bank,$cabang,$gambar){
		$hsl=$this->db->query("update tbl_rekening set rek_no='$norek',rek_nama='$nama',rek_bank='$bank',rek_cabang='$cabang',rek_logo='$gambar' where rek_id='$kode'");
		return $hsl;
	}
	function update_rekening_tanpa_logo($kode,$nama,$norek,$bank,$cabang){
		$hsl=$this->db->query("update tbl_rekening set rek_no='$norek',rek_nama='$nama',rek_bank='$bank',rek_cabang='$cabang' where rek_id='$kode'");
		return $hsl;
	}
	function hapus_rekening($kode){
		$hsl=$this->db->query("delete from tbl_rekening where rek_id='$kode'");
		return $hsl;
	}

}