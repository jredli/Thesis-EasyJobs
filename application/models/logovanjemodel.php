<?php

class logovanjemodel extends CI_Model{

    function __construct() {
     parent::__construct();
     $this->load->database();
    }
    
    function login($username,$password){
        $upit_log="SELECT * FROM korisnik k JOIN uloga u ON k.id_uloga=u.id_uloga WHERE ime='".$username."' AND lozinka ='".$password."'";
        $rez_login=  $this->db->query($upit_log);
        $podaci['logovanje_redovi']=  $rez_login->result_array();
        $podaci['broj_redova']= $rez_login->num_rows;
        
        return $podaci;
    }
    
    function dodaj($uloga){  
        $this->db->set('naziv', $uloga); 
        $this->db->insert('uloga');     
    }
    
    //Uloge
    function uloge(){
        $query=$this->db->get('uloga');
        return $query->result();
    }
    
    function obrisiUlogu($id){
            $this->db->where('id_uloga', $id);
            $this->db->delete('uloga');             
        }
    
    
}