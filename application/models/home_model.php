<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
class Home_model extends CI_Model { 
    
         function sveAnkete(){
         $query=$this->db->get('anketa');
         return $query->result(); 
         }
             function anketeOdgovori(){
        $query=$this->db->query("SELECT * FROM anketaodgovori");
return $query->result_array();
         }
            function dodajOdgovor($odgovori){
         $this->db->query("UPDATE anketaodgovori SET Rezultat = Rezultat + 1
        WHERE id IN (".implode(',',$odgovori).")");
         }
         
         function ankete(){
             $query=$this->db->get('anketa');
             return $query->result(); 
         }
         
         function odgovori(){
              $query=$this->db->get('anketaodgovori');
              return $query->result(); 
         }
         
         function dodajAnketu($pitanje,$odg1,$odg2){
             $this->db->query("INSERT INTO anketa (Naziv) VALUES ('".$pitanje."')");

             $pitanje_id = $this->db->insert_id();

             $this->db->query("INSERT INTO anketaodgovori (Odgovor,idAnketa) VALUES
            ('".$odg1."',".$pitanje_id." )");
             $this->db->query("INSERT INTO anketaodgovori (Odgovor,idAnketa) VALUES
            ('".$odg2."',".$pitanje_id." )");
 }
        function brisiAnketu($id){
            $this->db->where('id', $id);
            $this->db->delete('anketa');   
         }
         
         function izmeniAnketu($id, $pitanje){
             $this->db->where('id', $id);
             $this->db->update('anketa', $pitanje);
         }
         
         
}