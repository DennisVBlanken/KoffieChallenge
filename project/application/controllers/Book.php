<?php
class Book extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['books'] = $this->book_model->get_books();
        $data['menu_list'] = $this->book_model->get_menu();
        $data['title'] = 'Books Shop';

        $this->load->view('templates/header', $data);
        $this->load->view('book/index', $data);
        $this->load->view('templates/footer');
	}
    public function create() {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['menu_list'] = $this->book_model->get_menu();
    $data['title'] = 'Add a Book';

    $this->form_validation->set_rules('author', 'Author', 'required');
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('year', 'Year', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');
    $this->form_validation->set_rules('genre', 'Genre', 'required');

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('templates/header', $data);
        $this->load->view('book/create');
        $this->load->view('templates/footer');

    }
    else{
        $this->book_model->set_book();
    	header('location: /bookshop');
    }
    }

    public function edit() {
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['menu_list'] = $this->book_model->get_menu();
    $data['title'] = 'Edit a Book';
    $bookID = $this->uri->segment(3);
    $data['id'] = $bookID;
    $data['books'] = $this->book_model->get_books();

    $this->form_validation->set_rules('author', 'Author', 'required');
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('year', 'Year', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');
    $this->form_validation->set_rules('genre', 'Genre', 'required');

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('templates/header', $data);
        $this->load->view('book/edit');
        $this->load->view('templates/footer');

    }
    else{
        $result = $this->book_model->update_book($bookID);
        if ($result = "success") {
    	header('location: /bookshop');
        }
    }
    }
    public function delete() {
    $id= $this->uri->segment(3);
    $result = $this->book_model->delete_book($id);
        if ($result = "success") {
    	header('location: /bookshop');
        }
    }
}
