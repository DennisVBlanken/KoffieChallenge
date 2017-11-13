<?php
class Book_model extends CI_Model {

    public function __construct() {
		$this->load->database();
    }

	public function get_books($id = FALSE) {
        if ($id === FALSE) {
			$query = $this->db->get('books');
			return $query->result_array();
        }
        $query = $this->db->get_where('books', array('bookID' => $id));
        return $query->row_array();
	}

	public function get_menu() {
		$query = $this->db->get('bookmenu');
		return $query->result_array();
	}
    
    public function get_book($id) {
        $this->db->where('bookID', $id);
        $this->db->get('books');
    }

	public function set_book() {
    $this->load->helper('url');

    $data = array(
        'bookAuthor' => $this->input->post('author'),
        'bookTitle' => $this->input->post('title'),
        'bookYear' => $this->input->post('year'),
        'bookDesc' => $this->input->post('description'),
        'bookGenre' => $this->input->post('genre'),
    );


    return $this->db->insert('books', $data);
	}

    public function update_book($id) {
    $this->load->helper('url');

    $data = array(
        'bookID' => $id,
        'bookAuthor' => $this->input->post('author'),
        'bookTitle' => $this->input->post('title'),
        'bookYear' => $this->input->post('year'),
        'bookDesc' => $this->input->post('description'),
        'bookGenre' => $this->input->post('genre'),
    );

    $this->db->where('bookID', $id);
    $this->db->update('books', $data);
    return "success";
    }

    public function delete_book($id) {
    $this->load->helper('url');
    $this->db->where('bookID', $id);
    $this->db->delete('books');
    return "success";
    }
}