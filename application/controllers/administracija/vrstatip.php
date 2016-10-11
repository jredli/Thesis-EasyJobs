<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vrstatip extends Backend_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');     
    }   
    
    public function tip(){
            $this->load->model('menimodel', 'meni');
            
            $this->load->library('table');
            $meni=$this->meni->vrati_meni();            
            $this->load->model('logovanjemodel', 'uloga');
            $this->load->model('postovimodel', 'p');
                     
            
            //Unos vrste
            
             $vrstaKlik=$this->input->post('btnUnesiVrstu');
            
            if($vrstaKlik!=''){
             $vrsta=array(
                 'imeVrste'=>$this->input->post('tbNovaGrana'),
                 'granaposlaId'=>$this->input->post('ddlGranaNova')
             );
                
                $this->p->unesiVrstu($vrsta);
                redirect('administracija/vrstatip/tip');
                echo $this->db->last_query();
                
            }
            
            
            //Unos Grane
            
            
            $klik=$this->input->post('btnUnesiGranu');
            
            if($klik!=''){
            
                $naziv=$this->input->post('tbNovaGrana');
                $this->p->unesiGranu($naziv);
                redirect('administracija/vrstatip/tip');
                
            }
            
            //Unos tipa         
            $unesiTip=$this->input->post('btnUnesiTip');
            
            if($unesiTip!=''){    
                $tip=array(
                    'tip'=>$this->input->post('tbTip'),                  
                );                              
                $this->p->tipoglasainsert($tip);    
            }
            
             //Unos kategorije       
            $unesiVrstu=$this->input->post('btnUnesiVrstu');
            
            if($unesiVrstu!=''){    
                $vrsta=array(
                    'imeVrste'=>$this->input->post('tbVrsta'),                  
                );                              
                $this->p->vrstaposlainsert($vrsta);    
            }
            
            $this->load->library('table');
            
            //Vadjenje svih tipova
            $tipovi=$this->p->tipoglasa();
            //Pravljenje tabele
            $this->table->set_heading('Type', 'Delete');
            foreach($tipovi as $tip){                
                $del=anchor('administracija/vrstatip/brisitip/'.$tip->idTip, "<i class='fa fa-trash-o fa-2x'></i>");
                $this->table->add_row($tip->tip, $del);
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
            
            
            $this->table->clear();
            
            //Grane posla
            $podaci['granaposla']=$this->p->granaposla();
            
            
             //Vadjenje svih vrsta
            $vrste=$this->p->vrstaposla();
            //Pravljenje tabele
            $this->table->set_heading('Category', 'Delete');
            foreach($vrste as $v){                
                $del=anchor('administracija/vrstatip/brisivrstu/'.$v->idVrstaPosla, "<i class='fa fa-trash-o fa-2x'></i>");
                $this->table->add_row($v->imeVrste, $del);
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
            
            $podaci['tabela1']=$this->table->generate();       
            
            
            $this->load->view('administracija/aHeader');
            $this->load->view('administracija/tipvrsta', $podaci);
            $this->load->view('administracija/aFooter');
    }
    
    
    
    
    public function brisitip($id){
        $this->load->model('postovimodel', 'p');
        $this->p->brisitip($id);
        redirect('administracija/vrstatip/tip', REFRESH);
    }
    
    public function brisivrstu($id){
       $this->load->model('postovimodel', 'p');
        $this->p->brisivrstu($id);
        redirect('administracija/vrstatip/tip', REFRESH);
    }
    
   
    
    public function unesiVrstu(){
            
    }
    
    
    
    
}