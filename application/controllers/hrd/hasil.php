<?php 

class Hasil extends CI_Controller{

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
		$data['nilai'] = $this->model_user->get_nilaiK();
		$data['keterangan'] = $this->model_user->get_keterangan();
		$data['result'] = $this->model_user->get_bobot();
		//--- PEMBOBOTAN ---//
		$bobot = array();
		$asarray = json_decode(json_encode($data['nilai']), true);

		foreach ($asarray as $satu){
			$potong = array_slice($satu, 0); //copy array agar tetap
			
			$potong = array_splice($potong, 2, count($potong));
			

			foreach ($potong as $p) {
				$get_idx = array_search($p,$potong);
				if($get_idx === array_search($satu[$get_idx],$potong)){
					if($p == $satu['nama_karyawan'] || $p == $satu['nama_subbidang'] || $p == $satu['tanggal_lahir'] || $p == $satu['alamat']  ){
						$get_idx = $p;
					}else if($p>=0 && $p<=50){
						$get_idx = 1;
					}else if($p>=51 && $p<=60){
						$get_idx = 2;
					}else if($p>=61 && $p<=75){
						$get_idx = 3;
					}else if($p>=76 && $p<=90){
						$get_idx = 4;
					}else{
						$get_idx = 5;
					}
				}
				array_push($bobot, $get_idx);
			}	
		}
		$bobot = array_chunk($bobot, max(array_map('count', $asarray))-2); // array to matriks based column
		$data['bobot'] = $bobot;

		//array of array to array
		foreach($data['keterangan'] as $k=>$v) {
 		   $new[$k] = $v['keterangan'];
		}

		
		//Normalisasi
		$norm = array();
		$jumlah_kolom = array();
		// $output= array();

		// jumlah each column
		//i kolom dan j baris
		for($i=0; $i<=max(array_map('count', $bobot))-6; $i++){
			$temp = $bobot[0][$i];
			if($new[$i]=='Benefit'){
				for($j=0; $j<=count($bobot)-1; $j++){
					if ($temp<$bobot[$j][$i]){
						$temp= $bobot[$j][$i];
					}
				}
			}else{
				for($j=0; $j<=count($bobot)-1; $j++){
					if ($temp>$bobot[$j][$i]){
						$temp= $bobot[$j][$i];
					}
				}

			}
			array_push($jumlah_kolom, $temp);
		}
		 

		// hitung normalisasi
		foreach ($bobot as $dua) {
			$potong = array_slice($dua, 0); //copy array agar tetap
			array_push($norm, $dua[8], $dua[9], $dua[10], $dua[12]); //push 2 kolom pertama
			$potong = array_splice($potong, 0, count($potong)-5); //split selain 2 kolom pertama
			 
				for ($i=0; $i<=count($potong)-1; $i++){
					if ($new[$i] == "Benefit") {
						$hasil = round($potong[$i]/$jumlah_kolom[$i], 2);
						array_push($norm, $hasil);
					}else{
						$hasil = round($jumlah_kolom[$i]/$potong[$i], 2);
						array_push($norm, $hasil);
					}
				}
		}

		$norm = array_chunk($norm, max(array_map('count', $asarray))-3); // array to matriks based column
		$data['norm'] = $norm;

		// //Hasil, array of array to array
		foreach($data['result'] as $k=>$v) {
 		   $new[$k] = $v['bobot'];
		}

		$result= array();

		foreach ($norm as $tiga) {
			$potong = array_slice($tiga, 0); //copy array agar tetap
			array_push($result, $tiga[0], $tiga[1],$tiga[2], $tiga[3]); //push 4 kolom pertama
			$potong = array_splice($potong, 4, count($potong)); //split selain 4 kolom pertama
			$count=0;
			for($i=0; $i<=count($potong)-1; $i++){
				$count = $count+$potong[$i]*$new[$i];
				
			}
			array_push($result, $count);
			
		}

		$result = array_chunk($result, max(array_map('count', $asarray))-10); // array to matriks based column
		
		//Final

		function invenDescSort($item1,$item2)
		{
		    if ($item1[4] == $item2[4]) return 0;
		    return ($item1[4] < $item2[4]) ? 1 : -1;
		}
		usort($result,'invenDescSort');

		$data['wr'] = $result;

		$this->load->view('hrd/templates_hrd/header');
		$this->load->view('hrd/templates_hrd/sidebar',$data);
		$this->load->view('hrd/hasil/dashboard', $data);
		$this->load->view('hrd/templates_hrd/footer');
		
	}

}
?>