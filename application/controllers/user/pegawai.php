<?php 

class Pegawai extends CI_Controller{

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
		$data['pegawai'] = $this->model_user->get_pegawaiall($id_subbidang);
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/sidebar',$data);
		$this->load->view('user/pegawai/dashboard', $data);
		$this->load->view('user/templates/footer');
		
	}

	public function edit($id_pegawai){
		$data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row_array();
		$id_subbidang =  $this->session->userdata('id_subbidang');
		$data['user'] = $this->model_user->get_user($id_subbidang);
		$data['pegawai'] = $this->model_user->get_pegawai_sub($id_pegawai);
		$data['subbidang'] = $this->model_user->get_subbidang();
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/sidebar',$data);
		$this->load->view('user/pegawai/edit_pegawai', $data);
		$this->load->view('user/templates/footer');
	}


	public function update(){
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai','required');
		
		if($this->form_validation->run()== FALSE){
			$this->edit();
		}else{
		$id = $this->input->post('id_pegawai');
		$nama = $this->input->post('nama_pegawai');
		$subbidang = $this->input->post('subbidang');
		$tanggal = $this->input->post('jenis_kelamin');
		$alamat = $this->input->post('alamat');

		$data = array(
			'nama_pegawai' => $nama,
			'jenis_kelamin' => $tanggal,
			'alamat' => $alamat,
			'id_subbidang' => $subbidang,
		);

		$where = array(
			'id_pegawai' => $id, 
		);
		$this->model_user->update_pegawai($where,$data,'pegawai');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert dismissible fade show" role="alert">Data Pegawai Berhasil di Update<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('user/pegawai');
		}

	}

	public function tambah(){
		$data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row_array();
		$id_subbidang =  $this->session->userdata('id_subbidang');
		$data['user'] = $this->model_user->get_user($id_subbidang);
		$id_subbidang =  $this->session->userdata('id_subbidang');
		$data['pegawai'] = $this->model_user->get_subbidang_pegawai($id_subbidang);
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/sidebar',$data);
		$this->load->view('user/pegawai/tambah_pegawai', $data);
		$this->load->view('user/templates/footer');	
	}

	public function tambah_aksi(){

		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai','required');

		if($this->form_validation->run()== FALSE){
			$this->tambah();
		}else{
			$nama = $this->input->post('nama_pegawai');
			$tanggal = $this->input->post('jenis_kelamin');
			$alamat = $this->input->post('alamat');
			$subbidangg = $this->input->post('subbidang');

			$data = array(
				'nama_pegawai' => $nama,
				'jenis_kelamin' => $tanggal,
				'alamat' => $alamat,
				'id_subbidang' => $subbidangg,
			);
			
			$this->model_user->insert_pegawai($data,'pegawai');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert dismissible fade show" role="alert">Data Pegawai Berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('user/pegawai');
		}
	}


	public function hapus($id){
		$where = array('id_pegawai'=>$id);
		$cek = $this->model_user->is_ada_nilai($id);
		if (count($cek)>0){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert dismissible fade show" role="alert">Data Pegawai Tidak bisa dihapus karena dipakai tabel lain<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}else{
			$this->model_user->hapus_pegawai($where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert dismissible fade show" role="alert">Data Pegawai Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
		redirect('user/pegawai');
	}
}

?>