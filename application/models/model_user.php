<?php

class Model_user extends CI_Model{

	// HRD

	// Karyawan
	public function karyawan(){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('subbidang','karyawan.id_subbidang = subbidang.id_subbidang');
		$query=$this->db->get();
		return $query->result();
	}

	//Edit Karyawan
	public function get_karyawan($where){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('subbidang','karyawan.id_subbidang = subbidang.id_subbidang');
		$this->db->where(array('id_karyawan' => $where));
		$query=$this->db->get();
		return $query->result();
	}

	public function get_subbidang(){
		$query = $this->db->query('SELECT * FROM subbidang');
   		return $query->result();
	}
	
	public function update_karyawan($where, $data,$table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	//Tambah Karyawan
	public function insert_karyawan($data){
		$this->db->insert('karyawan',$data);
	}

	//Hapus Karyawan
	public function hapus_karyawan($where){
		$this->db->where($where);
		$this->db->delete('karyawan');
	}

	//kriteria
	public function kriteria(){
		$this->db->select('*');
		$this->db->from('kriteria');
		// $this->db->join('subbidang','karyawan.id_subbidang = subbidang.id_subbidang');
		$query=$this->db->get();
		return $query->result();
	}

	//Edit Kriteria
	public function get_kriteria($where){
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->where(array('id_kriteria' => $where));
		$query=$this->db->get();
		return $query->result();
	}
	
	public function update_kriteria($where, $data,$table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	//Tambah Kriteria
	public function insert_kriteria($data){
		$this->db->insert('kriteria',$data);
	}

	//Hapus Kriteria
	public function hapus_kriteria($where){
		$this->db->where($where);
		$this->db->delete('kriteria');
	}	

	
	//USER

	//karyawan
	public function get_karyawanall($subbidangs){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('subbidang','karyawan.id_subbidang = subbidang.id_subbidang');
		$this->db->where(array('karyawan.id_subbidang' => $subbidangs));
		$query=$this->db->get();
		return $query->result();
	}

	//Edit Karyawan
	public function get_karyawan_sub($where){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('subbidang','karyawan.id_subbidang = subbidang.id_subbidang');
		$this->db->where(array('id_karyawan' => $where));
		$query=$this->db->get();
		return $query->result();
	}

	public function is_ada_nilai($id){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('nilai','karyawan.id_karyawan = nilai.id_karyawan');
		$this->db->where(array('nilai.id_karyawan' => $id));
		$query=$this->db->get();
   		return $query->result();
	}

	public function get_subbidang_karyawan($where){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('subbidang','user.id_subbidang = subbidang.id_subbidang');
		$this->db->where(array('user.id_subbidang' => $where));
		$query=$this->db->get();
   		return $query->result();
	}

	//Tambah User
	// I am a fucking awesome baby, whatever reason i keeping alive, i am a baddest bitch, i can fucking do it
	// YOOO I AM bad bitch, gotta ruled the world... FUCK MISOGYNY
	/*public function get_subbidang_user($where){
		$this->db->select('user.nama_subbidang');
		$this->db->from('subbidang');
		$this->db->join('karyawan','subbidang.id_subbidang = karyawan.id_subbidang');
		$this->db->join('user','subbidang.id_subbidang = user.id_subbidang');
		$this->db->where(array('user.id_subbidang' => $where));	
		$query=$this->db->get();
		return $query->result();

	}*/

	//Nilai
	public  function get_nilai($subbidang){
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('karyawan','karyawan.id_karyawan = nilai.id_karyawan');
		$this->db->join('subbidang','karyawan.id_subbidang = subbidang.id_subbidang');
		$this->db->where(array('karyawan.id_subbidang' => $subbidang));
		$query=$this->db->get();
		return $query->result();

	}

	public function get_nilaiAll($where){
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('karyawan','karyawan.id_karyawan = nilai.id_karyawan');
		$this->db->where(array('nilai.id_nilai' => $where));
		$query=$this->db->get();
		return $query->result();
	}

	public function update_nilai($where, $data,$table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function get_karyawanN(){
		$query = $this->db->query('SELECT * FROM karyawan');
   		return $query->result();
	}

	public function hapus_nilai($where){
		$this->db->where($where);
		$this->db->delete('nilai');
	}	

	public function get_karyawan_sub_nilai($where){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('subbidang','karyawan.id_subbidang = subbidang.id_subbidang');
		$this->db->where(array('subbidang.id_subbidang' => $where));
		$query=$this->db->get();
		return $query->result();
	}

	public function insert_nilai($data){
		$this->db->insert('nilai',$data);
	}

	//HRD Nilai
	public function get_nilaiK(){
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('karyawan','karyawan.id_karyawan = nilai.id_karyawan');
		$query=$this->db->get();
		return $query->result();
	}

	



}
?>