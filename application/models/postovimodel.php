<?php
class postovimodel extends CI_Model
{
    //Svi oglasi
    function vrati_postove($number=3, $start = 0)
    {             
        $this->db->select('*');
        $this->db->from('oglas');
        $this->db->join('korisnik', 'korisnik.id_korisnik = oglas.id_korisnik');
        $this->db->join('vrstaPosla', 'vrstaPosla.idVrstaPosla=oglas.idVrstaPosla');
        $this->db->where('status', 1);    
        $this->db->limit($number, $start);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    //Vrste posla
    function vratiVrstu($idGrana){
        $this->db->where('granaposlaId', $idGrana);
        $query=$this->db->get('vrstaposla');
        return $query->result();
    }
    
    function vrati_postoveTip($filterId, $number = 3, $start = 0)
    {             
        $this->db->select('*');
        $this->db->from('oglas');
        $this->db->join('korisnik', 'korisnik.id_korisnik = oglas.id_korisnik');
        $this->db->join('vrstaPosla', 'vrstaPosla.idVrstaPosla=oglas.idVrstaPosla');
        $this->db->where('status', 1);    
        $this->db->where('idTip', $filterId);
        $this->db->limit($number, $start);
        $query = $this->db->get();
        
        return $query->result();
    }
    
  
    
       
    
    //Broj oglasa
      function vrati_broj_postova()
    {
        $this->db->select()->from('oglas');
        $query = $this->db->get();
        return $query->num_rows;
    }
    
    function vrati_broj_kom(){
        $this->db->select()->from('komentari');
        $query = $this->db->get();
        return $query->num_rows;
    }
    
      function vrati_broj_kor()
    {
        $this->db->select()->from('korisnik');
        $query = $this->db->get();
        return $query->num_rows;
    }
    
    //Jedan oglas
     function vrati_post($post_id)
    {
        $this->db->select('*');
        $this->db->from('oglas');
        $this->db->join('korisnik', 'korisnik.id_korisnik = oglas.id_korisnik');
        $this->db->where('id_oglas',$post_id);       
        $this->db->order_by('datum','desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    //Novi oglas
    function unesi_oglas($data)
    {
        $this->db->insert('oglas',$data);
        return $this->db->insert_id();
    }
    
    //Brisanje oglasa
    function obrisi_oglas($id){
        $this->db->where('id_oglas', $id);
        $this->db->delete('oglas');
    }
    
    //Objava oglasa
    function objavi_post($id){
        $this->db->set('status', 1);
        $this->db->where('id_oglas', $id);
        $this->db->update('oglas');
    }
    
    
   
    
    //Potraznja posla
    
    function ponuda($number=10, $start = 0){
        
        $this->db->select('*');
        $this->db->from('oglas');
        $this->db->join('korisnik', 'korisnik.id_korisnik = oglas.id_korisnik');
        $this->db->join('vrstaPosla', 'vrstaPosla.idVrstaPosla=oglas.idVrstaPosla');
        $this->db->where('status', 1);
        $this->db->where('idTip', 1);   
        $this->db->limit($number, $start);
        $query = $this->db->get();
        
        return $query->result();
        
    }
    
    //vrstaOglasa
     function vrstaposla(){
           $query=$this->db->get('vrstaPosla');
           return $query->result();
   }
   
   //dodavanje vrste posla
   function vrstaposlainsert($data){             
        $this->db->insert('vrstaPosla',$data);
        return $this->db->insert_id();
   }
    
        
   
     //Tip posla
     function tipoglasa(){
           $query=$this->db->get('tipoglasa');
           return $query->result();
        }
        
        
     //broj offer
        function brojoffer(){
          $this->db->where('idTip', 1);
          $query = $this->db->get('oglas');
          return $query->num_rows;
        }
     //broj demand
          function brojdemand(){
               $this->db->where('idTip',2);
          $query = $this->db->get('oglas');
          return $query->num_rows;
        }
    function tipFilterId($idFilter, $number = 3, $start = 0){
        
        $this->db->select('*');
        $this->db->from('oglas');
        $this->db->join('korisnik', 'korisnik.id_korisnik = oglas.id_korisnik');
        $this->db->join('vrstaPosla', 'vrstaPosla.idVrstaPosla=oglas.idVrstaPosla');
        $this->db->join('granaposla', 'granaposla.granaposlaId=oglas.granaposlaId');
        $this->db->where('status', 1);    
        $this->db->where('oglas.granaposlaId', $idFilter);       
        $this->db->limit($number, $start);
        $query = $this->db->get();        
    }
        
        
     //Grana posla
        
     function granaposla(){
         $query=$this->db->get('granaposla');
         return $query->result();
       }
       
     //Filter po grani
     function vrstafilter($idgrane){
          $this->db->select('*');  
          $this->db->from('vrstaposla');  
          $this->db->where('idVrstaPosla', $idgrane);  
          $query = $this->db->get();  
          return $query->result();  
     }
       
       function granaFilterId($idGrana){
        $this->db->select('*');
        $this->db->from('oglas');        
        $this->db->join('korisnik', 'korisnik.id_korisnik = oglas.id_korisnik');   
        $this->db->where('granaposlaId', $idGrana);       
        $this->db->order_by('datum','desc');
        $query = $this->db->get();
        return $query->result();
    }
        
         //dodavanje tipa oglasa
   function tipoglasainsert($data){          
        $this->db->insert('tipoglasa',$data);
   }
   
   //obrisi tip
    function brisitip($id){
        $this->db->where('idTip', $id);
        $this->db->delete('tipoglasa');
    }
   
   //obrisi kategoriju
   function brisivrstu($id){
        $this->db->where('idVrstaPosla', $id);
        $this->db->delete('vrstaposla');
    }
   
   //poslednji oglasi
   function poslednji(){         
        $this->db->select('*');
        $this->db->from('oglas');
        $this->db->where('status', 1); 
        $this->db->order_by('datum', 'desc');
        $query = $this->db->get();        
        return $query->result();
   }
        
   //Unos nove grane
   function unesiGranu($naziv){
       $this->db->set('grana', $naziv); 
        $this->db->insert('granaposla');  
   }
   
    //Unos nove vrste
   function unesiVrstu($data){
        $this->db->insert('vrstaposla', $data);
   }
     
   
   function filter($a1, $a2){
        $this->db->select('*');
        $this->db->from('oglas');
        $this->db->join('korisnik', 'korisnik.id_korisnik = oglas.id_korisnik');
        $this->db->where('idTip', $a1);
        $this->db->where('granaposlaId', $a2);
        $this->db->where('status', 1);
        $query = $this->db->get();        
        return $query->result();
   }
   
   
    
}
