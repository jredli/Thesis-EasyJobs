<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Oglasi extends Backend_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');     
    }   
    public function aOglasi(){      
            $this->load->model('postovimodel', 'oglasi');
            $this->load->library('table');
            
            //Vadjenje oglasa
            $oglasi=$this->db->get('oglas')->result();
            
          
            //Pravljenje tabele
            $this->table->set_heading('Title', 'Image', 'Text', 'Date', 'Delete', 'Publish');
            //Dimenzija slike
            foreach($oglasi as $oglas){
                $img=array(
                    'src'=>$oglas->p_slika,
                    'width'=>'150',
                );
            //Fleg za status oglasa
                if($oglas->status!=1){
                   $pub=anchor('administracija/oglasi/objaviOglas/'.$oglas->id_oglas, "<i class='fa fa-flag-o fa-2x'></i>");
                }
                else{
                    $pub=anchor('administracija/oglasi/objaviOglas/'.$oglas->id_oglas, "<i class='fa fa-flag fa-2x'></i>");
                }
                $del=anchor('administracija/oglasi/obrisiOglas/'.$oglas->id_oglas, "<i class='fa fa-trash-o fa-2x'></i>");
                $this->table->add_row($oglas->naslov, img($img), $oglas->tekst, $oglas->datum, $del, $pub);
            }
            
            //Izgled tagova
            $tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-hover">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
            
            $this->table->set_template($tmpl);
            
            $podaci['tabela']=$this->table->generate();   
        
            $this->load->view('administracija/aHeader');
            $this->load->view('administracija/aOglasi', $podaci);
            $this->load->view('administracija/aFooter');
    }
    
    //Obrisi oglas
    public function obrisiOglas($id){
            $this->load->model('postovimodel', 'postovi');
            $this->postovi->obrisi_oglas($id);
            redirect('administracija/oglasi/aOglasi');
        }
        
    public function objaviOglas($id){
        $this->load->model('postovimodel', 'postovi');
        $this->postovi->objavi_post($id);
        redirect('administracija/oglasi/aOglasi', REFRESH);
    }
        
    
}