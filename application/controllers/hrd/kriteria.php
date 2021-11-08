<?php 

class Kriteria extends CI_Controller{

	function __construct(){
		parent::__construct();
		if (!isset($this->session->userdata['levels'])){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert dismissible fade show" role="alert">Anda Belum Login<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
		}
	}
	public function index(){
		$data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('usernames')])->row_array();
		$data['kriteria'] = $this->model_user->kriteria();
		$this->load->view('hrd/templates_hrd/header');
		$this->load->view('hrd/templates_hrd/sidebar',$data);
		$this->load->view('hrd/kriteria/tampil_kriteria', $data);
		$this->load->view('hrd/templates_hrd/footer');
		
	}

	public function edit($id_kriteria){
		$data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('usernames')])->row_array();
		$data['kriteria'] = $this->model_user->get_kriteria($id_kriteria);
		$this->load->view('hrd/templates_hrd/header');
		$this->load->view('hrd/templates_hrd/sidebar',$data);
		$this->load->view('hrd/kriteria/edit_kriteria', $data);
		$this->load->view('hrd/templates_hrd/footer');
		
	}


	public function update(){
		$this->form_validation->set_rules('keterangan', 'Keterangan','required');

		if($this->form_validation->run()== FALSE){
			$this->edit();
		}else{
			$id = $this->input->post('id_kriteria');
			$nama = $this->input->post('nama_kriteria');
			$bobott = $this->input->post('bobot');
			$keterangana = $this->input->post('keterangan');

			$data = array(
				'nama_kriteria' => $nama,
				'bobot' => $bobott,
				'keterangan' => $keterangana,
			);

		$where = array(
			'id_kriteria' => $id, 
		);
		$this->model_user->update_kriteria($where,$data,'kriteria');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert dismissible fade show" role="alert">Data Kriteria Berhasil di Update<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('hrd/kriteria');
		}

	}

}
?>