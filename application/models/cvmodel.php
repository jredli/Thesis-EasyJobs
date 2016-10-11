<?php

class cvmodel extends CI_Model{

    function __construct() {
     parent::__construct();
     $this->load->database();
    }
    
    //Cv's
    function vraticv($id)
    {
        $this->db->select('*');
        $this->db->from('cv');
        $this->db->join('oglas','oglas.id_oglas = cv.id_oglas');
        $this->db->join('korisnik', 'korisnik.id_korisnik=oglas.id_korisnik'); 
        $this->db->where('oglas.id_korisnik', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    //broj Cv-a za odredjeni oglas
    function brcv(){
         $this->db->select('*');
        $this->db->from('cv');
        $this->db->join('oglas','oglas.id_oglas = cv.id_oglas');
        $this->db->where('id_korisnik', $this->session->userdata('id_kor'));
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    //Unos novog CV-ja
    function unoscv($data){
         $this->db->insert('cv',$data);
    }
    
}


