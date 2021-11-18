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
		
		// $data['pgw'] = $this->model_user->get_hrdP();
		
		$data['nilai'] = $this->model_user->get_nilaiK();
		$data['keterangan'] = $this->model_user->get_keterangan();
		$data['kriteria'] = $this->model_user->kriteria();
		$data['nilai_bobot'] = $this->model_user->get_nilai_bobot();
		$data['result'] = $this->model_user->get_bobot();

		//Melakukan pengecekan nilai bobot kriteria	
		if($data['nilai_bobot']==1.0000000223517418){
				
				$bobot = array();
				$asarray = json_decode(json_encode($data['nilai']), true);

				foreach ($asarray as $satu){
					$potong = array_slice($satu, 0); //copy array agar tetap
					
					$potong = array_splice($potong, 2, count($potong));
					
					//Melakukan pembobotan pada setiap nilai
					foreach ($potong as $p) {
						$get_idx = array_search($p,$potong);
						if($get_idx === array_search($satu[$get_idx],$potong)){
							if($p == $satu['nama_pegawai'] || $p == $satu['nama_subbidang'] || $p == $satu['jenis_kelamin'] || $p == $satu['alamat'] || $p == $satu['id_subbidang'] ){
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

				
				// //Normalisasi
				$norm = array();
				$jumlah_kolom = array();

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
				 

				// menghitung normalisasi
				foreach ($bobot as $dua) {
					$potong = array_slice($dua, 0); //copy array agar tetap
					array_push($norm, $dua[8], $dua[9], $dua[10], $dua[11], $dua[12]); //push 2 kolom pertama
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

				$norm = array_chunk($norm, max(array_map('count', $asarray))-2); // array to matriks based column
				$data['norm'] = $norm;

				//Hasil, array of array to array
				foreach($data['result'] as $k=>$v) {
		 		   $new[$k] = $v['bobot'];
				}

				$result= array();

				foreach ($norm as $tiga) {
					$potong = array_slice($tiga, 0); //copy array agar tetap
					array_push($result, $tiga[0], $tiga[1], $tiga[2], $tiga[3], $tiga[4]); //push 5 kolom pertama
					$potong = array_splice($potong, 5, count($potong)); //split selain 5 kolom pertama
					$count=0;
					for($i=0; $i<=count($potong)-1; $i++){
						$count = round($count+$potong[$i]*$new[$i],3);
						
					}
					array_push($result, $count);	
				}

				$result = array_chunk($result, max(array_map('count', $asarray))-9); // array to matriks based column

				usort($result,function($a,$b){
				  return $a[3]  <=> $b[3] //first desc
				      ?: $b[5]   <=> $a[5] 
				  ;
				});

				// function array_orderby()
				// {
				//     $args = func_get_args();
				//     $data = array_shift($args);
				//     foreach ($args as $n => $field) {
				//         if (is_string($field)) {
				//             $tmp = array();
				//             foreach ($data as $key => $row)
				//                 $tmp[$key] = $row[$field];
				//             $args[$n] = $tmp;
				//             }
				//     }
				//     $args[] = &$data;
				//     call_user_func_array('array_multisort', $args);
				//     return array_pop($args);
				// }

				// $sorted = array_orderby($result, 3, SORT_DESC, 5, SORT_ASC);
			

				// as of PHP 5.5.0 you can use array_column() instead of the above code
				// $brand= array_column($result[0]);
				// $city= array_column($result[1]);

				// print_r($brand);

				// foreach ($data as $key => $row) {
				//     $volume[$key]  = $row['volume'];
				//     $edition[$key] = $row['edition'];
				// }

				// $volume  = array_column($result, 5);
				// $edition = array_column($result, 4);

				// // Sort the data with volume descending, edition ascending
				// // Add $data as the last parameter, to sort by the common key
				// array_multisort($volume, SORT_DESC, $edition, SORT_ASC, $result);

				// array_multisort(array_column($result, 5),SORT_DESC, array_column($result, 3), SORT_ASC, SORT_NUMERIC, $result);


				// Sort the data with volume descending, edition ascending
				// Add $data as the last parameter, to sort by the common key
				// array_multisort($brand, SORT_DESC, $city, SORT_ASC, $data);
								
				//Sorting Nilai
				// function invenDescSort($item1,$item2)
				// {
				//     if ($item1[5] == $item2[5]) return 0;
				//     return ($item1[5] < $item2[5]) ? 1 : -1;
				// }

				// usort($result,'invenDescSort');

				// array_multisort($result[5], SORT_ASC, $result[3], SORT_DESC);

				// usort($result,function($a,$b){
				//     $c = $b[5] - $a[5];
				//     $c .= strcmp($b[4],$a[4]);
				// });

				// function cmp($a, $b) {
				//     return ($a[4], $b[4]);
				// }

				// usort($result, "cmp");

				// Asc sort
				// usort($result,function($first,$second){
				//     return strtolower($first[4]) > strtolower($second[4]);
				// });

				//Grouping Subbidang
				// function inven($item1,$item2)
				// {
				//     if ($item1[3] == $item2[3]) return 0;
				//     return strtolowe(($item1[3] < $item2[3]) ? -1 : 1);
				// }

				// usort($result,'inven');


				// function _group_by($array, $key) {
				//     $return = array();
				//     foreach($array as $val) {
				//         // $return[$val[$key]][] = $val;
				//         $return[$val[$key]][] = $val;
				//     }
				//     return $return;
				// }

				// $byGroup = _group_by($result, "3");

				// $grouped = array_group_by($result, '3');
				
				$data['wr'] = $result;
				
				// phpinfo();

				$this->load->view('hrd/templates_hrd/header');
				$this->load->view('hrd/templates_hrd/sidebar',$data);
				$this->load->view('hrd/hasil/tampil_hasil', $data);
				$this->load->view('hrd/templates_hrd/footer');		
		}else{
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert dismissible fade show" role="alert">Nilai Total Data Kriteria Harus Sama Dengan Satu<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('hrd/kriteria');

		}
	}

}
?>