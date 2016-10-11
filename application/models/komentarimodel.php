<?php

class komentarimodel extends CI_Model{

    function __construct() {
     parent::__construct();
     $this->load->database();
    }
    //Svi komentari za odabrani post
    function vrati_komentare($post_id)
    {
        $this->db->select('*');
        $this->db->from('komentari');
        $this->db->join('korisnik','korisnik.id_korisnik = komentari.id_korisnik');
        $this->db->where('id_oglas',$post_id);
        $this->db->where('status', 1);
        $this->db->order_by('datum','asc');
        $query = $this->db->get();
        return $query->result();
    }
    
    //Novi komentar
    function dodaj_komentar($data)
    {
        $this->db->insert('komentari',$data);
        return $this->db->insert_id();
    }
    
    function objavi_komentar($id){
        $this->db->set('status', 1);
        $this->db->where('id_komentar', $id);
        $this->db->update('komentari');
    }
    
    function svi_komentari(){
        $query=$this->db->get('komentari');
        return $query->result();
    }
    
    function obrisi_komentar($id){
        $this->db->where('id_komentar', $id);
        $this->db->delete('komentari');
    }
}


