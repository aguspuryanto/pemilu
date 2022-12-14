<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard1 extends CI_Controller
{
	/* Endpoint */
	private $url = 'http://103.82.240.253/disurvey_multi/';

	public function __construct() {
		parent::__construct();
		// Load session library
		$this->load->library('session');
	}
	
    public function index()
    {
		if(!$this->session->has_userdata('logged_in')) {
			redirect('/');
		}

		/* Data */
		$loggedIn = $this->session->userdata('logged_in');
		$data1 = $this->getElektabilitas([
            'kdusr'=> $loggedIn[0]['kode']
        ]);

		$qcLabels = array_keys($data1['result_elektabilitas'][0]);
		$qcValues = array_values($data1['result_elektabilitas'][0]);

		// Statistik
		$data2 = $this->getGrafik2([
            'kode'=> $loggedIn[0]['kode']
        ]);

		$dataLabels = array();
		$dataValues = array();
		foreach($data2['result_stat'] as $labels) {
			$dataLabels[] = $labels['tgl'];
			$dataValues[] = $labels['jml'];
		}

		$data = array(
			'data1' => $data1,
			'qcLabels' => implode("','", $qcLabels),
			'qcValues' => implode(",", $qcValues),
			'dataLabels' => implode("','", $dataLabels),
			'dataValues' => implode(",", $dataValues)
		);
		// echo json_encode($data); die();

        $this->load->view('dashboard1', $data);
    }

	public function pendukung(){
		// echo "pendukung";
		if(!$this->session->has_userdata('logged_in')) {
			redirect('/');
		}

		// 
		$get = $this->input->get();

		/* Data */
		$loggedIn = $this->session->userdata('logged_in');
		if($get) {
			$params = [
				'kode'=> $loggedIn[0]['kode'], 
				'filter'=> (!empty($get['filterby'])) ? (int)$get['filterby'] : 1,
				'cari'=> (!empty($get['s'])) ? $get['s'] : '',
				'isrekrut'=> 1
			];

			$json = $this->getKonstituenSearch($params);
			// echo json_encode($params) . "<br>";
			// echo json_encode($json); die();
		}
		else {
			$json = $this->getKonstituenList([
				'kode'=> $loggedIn[0]['kode'], 
				'isrekrut'=> 1
			]);
		}
		// echo json_encode($json);

		$data = array(
			'title' => 'Pendukung',
			'dataList' => ($json),
			'get' => ($get)
		);

        $this->load->view('pendukung', $data);
	}

	public function pendukungView(){
		// echo "pendukung";
		if(!$this->session->has_userdata('logged_in')) {
			redirect('/');
		}

		// 
		$get = $this->input->get();

		/* Data */
		$loggedIn = $this->session->userdata('logged_in');
		if($get) {
			$params = [
				'kode'=> $loggedIn[0]['kode'], 
				'filter'=> 1, //NIK
				'cari'=> $get['nik'],
				'isrekrut'=> 1
			];

			$json = $this->getKonstituenSearch($params);
			// echo json_encode($params) . "<br>";
			// echo json_encode($json);

			$data = array(
				'title' => 'Pendukung',
				'dataList' => ($json),
				'get' => ($get)
			);

			$this->load->view('pendukung_detail', $data);
			
		}
	}

	public function hasilTim($kode=""){
		// 
		// echo $kode;
		if(!$this->session->has_userdata('logged_in')) {
			redirect('/');
		}

		/* Data */
		$loggedIn = $this->session->userdata('logged_in');
		
		$data1 = $this->getHasilTim([
            'kode'=> $loggedIn[0]['kode']
        ]);
		// echo json_encode($data1);

		if(!empty($kode)) {
			$data1 = $this->getHasilTimAnggota([
				'kdusr'=> $loggedIn[0]['kode'],
				'kode'=> $kode
			]);
			// echo json_encode($data1);
		}

		$data = array(
			'title' => 'Hasil Tim',
			'dataList' => ($data1)
		);

        $this->load->view('hasil_tim', $data);
	}

	public function quickCount(){
		// 
		if(!$this->session->has_userdata('logged_in')) {
			redirect('/');
		}

		/* Data */
		$loggedIn = $this->session->userdata('logged_in');		
		$data1 = $this->getQuickCount([
            'kode'=> $loggedIn[0]['kode']
        ]);
		// echo json_encode($data1);

		$data = array(
			'title' => 'Quick Count',
			'dataList' => ($data1)
		);

        $this->load->view('quick_count', $data);
	}

	public function detailQc(){
		// 
		if(!$this->session->has_userdata('logged_in')) {
			redirect('/');
		}

		// 
		$get = $this->input->get();

		/* Data */
		$loggedIn = $this->session->userdata('logged_in');
		
		$params = [
            'kode'=> $loggedIn[0]['kode'],
            'filter'=> ($get) ? ($get['filter']+1) : 1,
            'kd_filter'=> ($get) ? ($get['kd_filter']) : '01'
        ];
		// echo json_encode($params);

		$data1 = $this->getQuickCountHasil($params);
		// echo json_encode($data1); die();

		$data = array(
			'title' => 'Detail Quick Count',
			'header_title' => $this->filterName($params['filter']),
			'dataList' => ($data1)
		);

		$data = array_merge($data, $params);

        $this->load->view('quick_count_detail', $data);
	}

	public function petaSuara(){
		// 
		if(!$this->session->has_userdata('logged_in')) {
			redirect('/');
		}

		// 
		$get = $this->input->get();

		/* Data */
		$loggedIn = $this->session->userdata('logged_in');
		
		$params = [
            'kode'=> $loggedIn[0]['kode'],
            'filter'=> ($get) ? ($get['filter']+1) : 1,
            'kd_filter'=> ($get) ? ($get['kd_filter']) : '01'
        ];
		// echo json_encode($params) ."<br>";

		$data1 = $this->getPetasuara($params);
		// echo json_encode($data1); die();

		$data = array(
			'title' => 'Peta Suara',
			'header_title' => $this->filterName($params['filter']),
			'dataList' => ($data1)
		);

		$data = array_merge($data, $params);

        $this->load->view('peta_suara', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}

	public function loadProgress(){
		if(!$this->session->has_userdata('logged_in')) {
			redirect('/');
		}

		/* Data */
		$loggedIn = $this->session->userdata('logged_in');
		$data1 = $this->getElektabilitas([
            'kdusr'=> $loggedIn[0]['kode']
        ]);

		$data = array(
			'data1' => $data1,
		);
		// echo json_encode($data); die();

        $this->load->view('_partials/stat_grafik_ajax', $data);

	}

	public function loadProgressGrafik(){
		if(!$this->session->has_userdata('logged_in')) {
			redirect('/');
		}

		/* Data */
		$loggedIn = $this->session->userdata('logged_in');
		// Statistik
		$data2 = $this->getGrafik2([
            'kode'=> $loggedIn[0]['kode']
        ]);

		$dataLabels = array();
		$dataValues = array();
		foreach($data2['result_stat'] as $labels) {
			$dataLabels[] = $labels['tgl'];
			$dataValues[] = $labels['jml'];
		}

		$data = array(
			'dataLabels' => $dataLabels,
			'dataValues' => $dataValues
		);
		echo json_encode($data);

        // $this->load->view('_partials/stat_grafik_ajax', $data);

	}

	/* Helper Function
	 * --
	 */

	public function getKodeKel($kodekel, $filter) {
		if($filter=="2") return substr($kodekel, 0, 2);
		if($filter=="3") return substr($kodekel, 0, 5);
		if($filter=="4") return substr($kodekel, 0, 8);
	}

	public function filterName($filter){
		switch ($filter) {
			case "2":
			  return "Kab/Kota";
			  break;
			case "3":
			  return "Kecamatan";
			  break;
			case "4":
			  return "Kelurahan";
			  break;
			case "5":
			  return "TPS";
			  break;
			default:
			  return "Propinsi";
		}
	}

	public function getPetasuara($data){
		return getCurl($data, 'select_rekrut_hasil.php');
	}

	public function getHasilTim($data){
		return getCurl($data, 'hasil_tim.php');
	}

	public function getHasilTimAnggota($data){
		return getCurl($data, 'hasil_tim_anggota.php');
	}

	public function getElektabilitas($data){
		return getCurl($data, 'elektabilitas.php');
	}

	public function getQuickCount($data){
		return getCurl($data, 'select_qc.php');
	}

	public function getQuickCountHasil($data){
		return getCurl($data, 'select_qc_hasil_1.php');
	}

	public function getGrafik2($data){
		return getCurl($data, 'select_statistik.php');
	}

	public function getKonstituenList($data){
		return getCurl($data, 'select_konstituen_list.php');
	}

	public function getKonstituenSearch($data){
		return getCurl($data, 'search_nik.php');
	}
}
