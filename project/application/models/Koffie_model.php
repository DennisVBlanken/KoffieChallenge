<?php
class Koffie_model extends CI_Model {

    public function __construct() {
		$this->load->database();
    }

    function login($Gebruikersnaam, $Wachtwoord){
    $this->db->select('Id, Gebruikersnaam, Wachtwoord, RoleName');
    $this->db->from('gebruikers');
    $this->db->where('Gebruikersnaam', $Gebruikersnaam);
    $this->db->where('Wachtwoord', $Wachtwoord);
    $this->db->limit(1);
 
   $query = $this->db->get();
 
   if($query -> num_rows() == 1){
     return $query->result();
   }
   else{
     return false;
   }
 }
}