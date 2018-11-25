<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{

		$this->load->view('welcome_message');
	}
	public function book(){
		$form_data = $this->input->post();
		$data['email'] = $this->input->post("email");
		$data['name'] = $this->input->post("username");
		$data['passengers'] = $this->input->post("passengers");
		$departure = date('Y-m-d H:i:s',strtotime($this->input->post("departure")));
		$data['departure'] = $departure;
		$this->load->model('Booking');
		$this->Booking->save($data);
		$this->load->view('welcome_result', $data);
	}
}
