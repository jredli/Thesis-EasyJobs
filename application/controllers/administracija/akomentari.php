<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akomentari extends Backend_Controller {
    
    
    
	 public function objavakom(){
        $this->load->model('komentarimodel', 'komentari');
            $this->load->library('table');
            
            //Vadjenje oglasa
            $komentari=$this->komentari->svi_komentari();
            
          
            //Pravljenje tabele
            $this->table->set_heading('Comment text', 'Date added', 'Delete', 'Publish');
          
            foreach($komentari as $komentar){              
            //Fleg za status oglasa
                if($komentar->status!=1){
                   $pub=anchor('administracija/akomentari/objaviKomentar/'.$komentar->id_komentar, "<i class='fa fa-flag-o fa-2x'></i>");
                }
                else{
                    $pub=anchor('administracija/akomentari/objaviKomentar/'.$komentar->id_komentar, "<i class='fa fa-flag fa-2x'></i>");
                }
                $del=anchor('administracija/akomentari/obrisiKomentar/'.$komentar->id_komentar, "<i class='fa fa-trash-o fa-2x'></i>");
                $this->table->add_row($komentar->komentar, $komentar->datum, $del, $pub);
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
            $this->load->view('administracija/aKomentari', $podaci);
            $this->load->view('administracija/aFooter');
    }
    
    public function objaviKomentar($id){
        $this->load->model('komentarimodel', 'komentari');
        $this->komentari->objavi_komentar($id);        
        redirect('administracija/akomentari/objavakom', REFRESH);
    }
    
    public function obrisiKomentar($id){
        $this->load->model('komentarimodel', 'komentari');
        $this->komentari->obrisi_komentar($id);
        redirect('administracija/akomentari/objavakom', REFRESH);
    }
}
        
