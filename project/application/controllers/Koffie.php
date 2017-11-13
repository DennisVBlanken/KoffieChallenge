<?php
class Koffie extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('koffie_model');
        $this->load->helper('url_helper');
    }

	public function index(){
        $data['title'] = 'Login screen';

		$this->load->helper(array('form'));
        $this->load->view('templates/header', $data);
        $this->load->view('app/login');
        $this->load->view('templates/footer');
	}

    public function home() {
        $data['title'] = 'Koffie Selector';

        $this->load->view('templates/header', $data);
        $this->load->view('app/home', $data);
        $this->load->view('templates/footer');
	}
}