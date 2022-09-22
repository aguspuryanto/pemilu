<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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
		if($this->session->has_userdata('logged_in')) {
			redirect('/dashboard1');
		}

        $this->load->view('login');
    }

    public function login()
    {
        // redirect('dashboard1');
		$post = $this->input->post();
		// echo json_encode($post);
		if(!$post) {
			// redirect('/');
		}

		/* Data */
		$json = getCurl([
            'usernm'=> $post['usernm'], 
            'passwd'=> $post['passwd']
        ]);

		// echo $json['success']; die();
		if($json['success'] == "0") {
			$this->session->set_flashdata('msg', $json['message']);
			$this->session->keep_flashdata('msg');
			redirect('/', 'refresh');
		}
		else {
			$session_data = $json['result'];
			$this->session->set_userdata('logged_in', $session_data);
			redirect('dashboard1');
		}
    }

	public function logout(){
		$this->session->unset_userdata('logged_in', array());
		$this->session->set_flashdata('msg', 'Successfully Logout');
		$this->session->keep_flashdata('msg');
		redirect('/', 'refresh');
	}
}
