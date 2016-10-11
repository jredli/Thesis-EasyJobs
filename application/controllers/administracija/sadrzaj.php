<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sadrzaj extends Backend_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');     
    }   
    
    public function stranice(){
            $this->load->model('menimodel', 'meni');
            
            $this->load->library('table');
            $meni=$this->meni->vrati_meni();            
            $this->load->model('logovanjemodel', 'uloga');
                       
            //Unos linka            
            $unesiLink=$this->input->post('btnUnesiLink');
            
            if($unesiLink!=''){    
                $meniRef=array(
                    'putanja'=>$this->input->post('tbMenu'),
                    'link'=>$this->input->post('tbLink')                    
                );                              
                $this->meni->dodajMeni($meniRef);    
            }
            
            //Unos uloge
            $unesiUlogu=$this->input->post('btnUloga');
            
            if($unesiUlogu!=''){
                $uloga=$this->input->post('tbUloga');
                $this->uloga->dodaj($uloga);
            }
                      
            
            $this->table->set_heading('Reference', 'Link', 'Delete');
            //Dimenzija slike
            foreach($meni as $m){          
                
                $del=anchor('administracija/sadrzaj/obrisiMeni/'.$m->id_meni, "<i class='fa fa-trash-o fa-2x'></i>");
                $this->table->add_row($m->putanja, $m->link, $del);
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
        
           
            $uloga=$this->uloga->uloge();
            
            $this->table->set_heading('Role', 'Delete');
            
            foreach($uloga as $u){          
                
                $del=anchor('administracija/sadrzaj/obrisiUlogu/'.$u->id_uloga, "<i class='fa fa-trash-o fa-2x'></i>");
                $this->table->add_row($u->naziv, $del);
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
            
            $podaci['uloge']=$this->table->generate();  
            
            
            
            $this->load->view('administracija/aHeader');
            $this->load->view('administracija/sadrzaj', $podaci);
            $this->load->view('administracija/aFooter');
    }
    
    public function obrisiMeni($id){
        $this->load->model('menimodel', 'meni');
        $this->meni->obrisiMeni($id);
        redirect('administracija/sadrzaj/stranice', REFRESH);
    }
    
    public function obrisiUlogu($id){
        $this->load->model('logovanjemodel', 'uloga');
        $this->uloga->obrisiUlogu($id);
        redirect('administracija/sadrzaj/stranice', REFRESH);
    }
    
    
    
    
}