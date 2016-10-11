<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Backend_Controller {
    
    
    
        //Azuriranje korisnika i dodavanje novih
	public function dashboard(){
            
            $this->load->model('korisnicimodel', 'korisnici');                 
            $this->load->library('table');
            
            //Vadjenje svih korisnika
            $korisnici=$this->korisnici->svi_korisnici()->result();
            //Pravljenje tabele
            $this->table->set_heading('Firstname', 'Lastname', 'Email', 'Password','Image', 'User role', 'Edit', 'Delete');
            foreach($korisnici as $korisnik){
                $edit=anchor('administracija/admin/izmeniKorisnika/'.$korisnik->id_korisnik, "<i class='fa fa-pencil fa-2x'></i>");
                $del=anchor('administracija/admin/obrisiKorisnika/'.$korisnik->id_korisnik, "<i class='fa fa-trash-o fa-2x'></i>");
                $this->table->add_row($korisnik->ime, $korisnik->prezime, $korisnik->email, $korisnik->lozinka, img($korisnik->slika_thumb), $korisnik->naziv, $edit, $del);
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
            
            //Dodavanje korisnika
            $unesi=$this->input->post('btnUnesiKorisnika');
            if($unesi!=''){

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '6900';
            $config['upload_path'] = './img/korisnici/';
            $config['max_width']  = '6024';
            $config['max_height']  = '6768';
            $putanja='img/korisnici/';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('fKorSlika')){
            $error = array('error' => $this->upload->display_errors());
            foreach($error as $err){
              echo $err;
            }
            }
            else{
                $data=array('upload_data'=>$this->upload->data());
                
               $this->resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
                   $korisnik=array(
                        'ime'=>$this->input->post('tbIme'),
                        'prezime'=>$this->input->post('tbPrezime'),
                        'email'=>$this->input->post('tbEmail'),
                        'lozinka'=>$this->input->post('tbLozinka'),
                        'slika'=>$putanja.$data['upload_data']['file_name'],                       
                        'slika_thumb'=>'img/thumb/'.$data['upload_data']['raw_name'].'_thumb'.$data['upload_data']['file_ext'],
                        'id_uloga'=>$this->input->post('ddlUloge')
                    );
                  
                    $this->korisnici->unesi_korisnika($korisnik);
                    redirect('administracija/admin/dashboard', REFRESH);
                                
            }
            }       
            
            $this->load->view('administracija/aHeader');
            $this->load->view('administracija/aKorisnici', $podaci);
            $this->load->view('administracija/aFooter');
	}
        
        //Smanjivanje slike i pravljenje thumbnaila
        public function resize($path, $file){
            $config['image_library']='gd2';
            $config['source_image']=$path;
            $config['create_thumb']=TRUE;
            $config['quality']="100%";
            $config['width']=70;
            $config['height']=75;
            $config['new_image']='./img/thumb/'.$file;
            
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
               
              
        }
        
        //Brisanje korisnika
        public function obrisiKorisnika($id){
            $this->load->model('korisnicimodel', 'korisnici');
            $this->korisnici->obrisi_korisnika($id);
            redirect('administracija/admin/dashboard');
        }
        
        //Izmeni korisnika
        public function izmeniKorisnika($id){
            $this->load->model('korisnicimodel', 'korisnik');
            $klik=$this->input->post('btnPromeni');
            $podaci['id']=$id;
            if($klik!=''){
                $korisnik=array(
                        'ime'=>$this->input->post('tbIme'),
                        'prezime'=>$this->input->post('tbPrezime'),
                        'email'=>$this->input->post('tbEmail'),
                        'lozinka'=>$this->input->post('tbLozinka'),
                        'id_uloga'=>$this->input->post('ddlUloge')
                    );
                $this->korisnik->izmeni_korisnika($id, $korisnik);
                redirect('administracija/admin/dashboard', REFRESH);
            }
            $this->load->view('administracija/aHeader');
            $this->load->view('administracija/izmeniKorisnika',$podaci);
            $this->load->view('administracija/aFooter');
                       
        }
}
        
