<?php

class menimodel extends CI_Model{

    function __construct() {
     parent::__construct();
     $this->load->database();
    }
    
    function vrati_meni(){
        $query=$this->db->get('meni');
        return $query->result();
    }
    function ucitajMeniPocetna(){
            $query=$this->db->query('SELECT * FROM meni WHERE status <> 2 and status <> 3 and status <> 4');            
            return $query->result();
        }
    function ucitajMeniAdmin(){
            $query=$this->db->query('SELECT * FROM meni WHERE status <> 2 ORDER BY status ASC');            
            return $query->result();
        }
    function ucitajMeniKorisnik(){
            $query=$this->db->query('SELECT * FROM meni WHERE status <> 3');            
            return $query->result();
        }
        
       function obrisiMeni($id){
            $this->db->where('id_meni', $id);
            $this->db->delete('meni');             
        }
        
        function dodajMeni($data){
            $this->db->insert('meni', $data);
        }
        
    }

