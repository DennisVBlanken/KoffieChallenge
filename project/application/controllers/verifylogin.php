<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

function __construct(){
   parent::__construct();
   $this->load->model('koffie_model','',TRUE);
}

function index(){
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('gebruikersnaam', 'Gebruikersnaam', 'required');
   $this->form_validation->set_rules('wachtwoord', 'Wachtwoord', 'required|callback_check_database');

   if($this->form_validation->run() == FALSE){
    	//Field validation failed.  User redirected to login page
    	$this->load->view('app/login');
   }
   else{
    	//Go to private area
    	redirect('home', 'refresh');
   }
}

function check_database($wachtwoord){
   //Field validation succeeded.  Validate against database
   $gebruikersnaam = $this->input->post('gebruikersnaam');

   //query the database
   $result = $this->koffie_model->login($gebruikersnaam, $wachtwoord);

   if($result){
     $sess_array = array();
     foreach($result as $row){
       $sess_array = array(
         'id' => $row->id,
         'gebruikersnaam' => $row->gebruikersnaam
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Ongeldig gebruikersnaam of wachtwoord');
     return false;
   }
 }
}