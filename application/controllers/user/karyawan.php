<?php 

class Karyawan extends CI_Controller{

	function __construct(){
		parent::__construct();
		if (!isset($this->session->userdata['level'])){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert dismissible fade show" role="alert">Anda Belum Login<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
		}
	}
	public function index(){
		$data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row_array();
		$id_subbidang =  $this->session->userdata('id_subbidang');
		$data['user'] = $this->model_user->get_user($id_subbidang);
		$data['karyawan'] = $this->model_user->get_karyawanall($id_subbidang);
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/sidebar',$data);
		$this->load->view('user/karyawan/dashboard', $data);
		$this->load->view('user/templates/footer');
		
	}

	public function edit($id_karyawan){
		$data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row_array();
		$id_subbidang =  $this->session->userdata('id_subbidang');
		$data['user'] = $this->model_user->get_user($id_subbidang);
		$data['karyawan'] = $this->model_user->get_karyawan_sub($id_karyawan);
		$data['subbidang'] = $this->model_user->get_subbidang();
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/sidebar',$data);
		$this->load->view('user/karyawan/edit_karyawan', $data);
		$this->load->view('user/templates/footer');
	}


	public function update(){
		$this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan','required');
		
		if($this->form_validation->run()== FALSE){
			$this->edit();
		}else{
		$id = $this->input->post('id_karyawan');
		$nama = $this->input->post('nama_karyawan');
		$subbidang = $this->input->post('subbidang');
		$tanggal = $this->input->post('tanggal_lahir');
		$alamat = $this->input->post('alamat');

		$data = array(
			'nama_karyawan' => $nama,
			'tanggal_lahir' => $tanggal,
			'alamat' => $alamat,
			'id_subbidang' => $subbidang,
		);

		$where = array(
			'id_karyawan' => $id, 
		);
		$this->model_user->update_karyawan($where,$data,'karyawan');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert dismissible fade show" role="alert">Data Karyawan Berhasil di Update<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('user/karyawan');
		}

	}

	public function tambah(){
		$data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row_array();
		$id_subbidang =  $this->session->userdata('id_subbidang');
		$data['user'] = $this->model_user->get_user($id_subbidang);
		$id_subbidang =  $this->session->userdata('id_subbidang');
		$data['karyawan'] = $this->model_user->get_subbidang_karyawan($id_subbidang);
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/sidebar',$data);
		$this->load->view('user/karyawan/tambah_karyawan', $data);
		$this->load->view('user/templates/footer');	
	}

	public function tambah_aksi(){

		$this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan','required');

		if($this->form_validation->run()== FALSE){
			$this->tambah();
		}else{
			$nama = $this->input->post('nama_karyawan');
			$tanggal = $this->input->post('tanggal_lahir');
			$alamat = $this->input->post('alamat');
			$subbidangg = $this->input->post('subbidang');

			$data = array(
				'nama_karyawan' => $nama,
				'tanggal_lahir' => $tanggal,
				'alamat' => $alamat,
				'id_subbidang' => $subbidangg,
			);
			
			$this->model_user->insert_karyawan($data,'karyawan');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert dismissible fade show" role="alert">Data Karyawan Berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('user/karyawan');
		}
	}


	public function hapus($id){
		$where = array('id_karyawan'=>$id);
		$cek = $this->model_user->is_ada_nilai($id);
		if (count($cek)>0){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert dismissible fade show" role="alert">Data Karyawan Tidak bisa dihapus karena dipakai tabel lain<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}else{
			$this->model_user->hapus_karyawan($where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert dismissible fade show" role="alert">Data Karyawan Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
		redirect('user/karyawan');
	}
}

?>