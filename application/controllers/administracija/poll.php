<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class poll extends Backend_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');     
    }   
    
    public function editpoll(){
            $this->load->library('table');
            $this->load->model('home_model','anketa');
            
            $sve_ankete=$this->anketa->ankete();
            $svi_odgovori=$this->anketa->odgovori();
            
            $this->table->set_heading('Title', 'Delete', 'Edit');
          
            foreach($sve_ankete as $a){              
                    
               $edit=anchor('administracija/poll/izmenapoll/'.$a->id, "<i class='fa fa-pencil fa-2x'></i>");
               $del=anchor('administracija/poll/deletepoll/'.$a->id, "<i class='fa fa-trash-o fa-2x'></i>");
                $this->table->add_row($a->Naziv, $edit, $del);
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
            
            $podaci['ankete']=$this->table->generate(); 
            
            $title=$this->input->post('tbAnketa');
            $q1=$this->input->post('tbPitanje1');
            $q2=$this->input->post('tbPitanje2');
            
            $dugme=$this->input->post('btnUnesiAnketu');
            
            if($dugme!=''){
                  $this->anketa->dodajAnketu($title, $q1, $q2);
                  redirect('administracija/poll/editpoll', 'refresh');
            }
            
            
            
            $this->load->view('administracija/aHeader');
            $this->load->view('administracija/aAnketa', $podaci);
            $this->load->view('administracija/aFooter');
    }
    
    public function deletepoll($id){
        $this->load->model('home_model','anketa');
        $this->anketa->brisiAnketu($id);
        redirect('administracija/poll/editpoll', 'refresh');
    }
    
    public function izmenapoll($id){
        $this->load->model('home_model', 'anketa');
        
        $klik=$this->input->post('btnAnketaIzmena');
            $podaci['id']=$id;
            if($klik!=''){
                $title=array(
                    'Naziv'=>$this->input->post('tbAnketa')
                );             
              
                $this->anketa->izmeniAnketu($id, $title);
                redirect('administracija/poll/editpoll', 'refresh');
            }
        
        $this->load->view('administracija/aHeader');
        $this->load->view('administracija/anketaizmena', $podaci);
        $this->load->view('administracija/aFooter');
    }
    
    
    
}