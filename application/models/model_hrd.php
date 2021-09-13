<?php

class Model_hrd extends CI_Model{
	public function countData(){
      $totalsiaga = "SELECT COUNT(*) AS jumlah_siaga FROM pegawai AS b JOIN subbidang AS j ON b.id_subbidang=j.id_subbidang WHERE b.id_subbidang=1";
      $totalsiaga = $this->db->query($totalsiaga)->row_array();
      $totalsdm = "SELECT COUNT(*) AS jumlah_sdm FROM pegawai AS b JOIN subbidang AS j ON b.id_subbidang=j.id_subbidang WHERE b.id_subbidang=2";
      $totalsdm = $this->db->query($totalsdm)->row_array();
      $totalyansokes = "SELECT COUNT(*) AS jumlah_yansokes FROM pegawai AS b JOIN subbidang AS j ON b.id_subbidang=j.id_subbidang WHERE b.id_subbidang=3";
      $totalyansokes = $this->db->query($totalyansokes)->row_array();
      $totalkeuangan = "SELECT COUNT(*) AS jumlah_keuangan FROM pegawai AS b JOIN subbidang AS j ON b.id_subbidang=j.id_subbidang WHERE b.id_subbidang=4";
      $totalkeuangan = $this->db->query($totalkeuangan)->row_array();
      $totalumum = "SELECT COUNT(*) AS jumlah_umum FROM pegawai AS b JOIN subbidang AS j ON b.id_subbidang=j.id_subbidang WHERE b.id_subbidang=5";
      $totalumum = $this->db->query($totalumum)->row_array();
      $totalhumas = "SELECT COUNT(*) AS jumlah_humas FROM pegawai AS b JOIN subbidang AS j ON b.id_subbidang=j.id_subbidang WHERE b.id_subbidang=6";
      $totalhumas = $this->db->query($totalhumas)->row_array();

      $data['totalsiaga']=$totalsiaga['jumlah_siaga'];
      $data['totalsdm']=$totalsdm['jumlah_sdm'];
      $data['totalyansokes']=$totalyansokes['jumlah_yansokes'];
      $data['totalkeuangan']=$totalkeuangan['jumlah_keuangan'];
      $data['totalumum']=$totalumum['jumlah_umum'];
      $data['totalhumas']=$totalhumas['jumlah_humas'];
      return $data;
    
   }




}
?>