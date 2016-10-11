<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Strane extends Frontend_Controller {
    
    
    
        //Strana o autoru
	public function autor()
	{
            $this->load->model('menimodel','meni');
            $podaci['meni']=$this->meni->ucitajMeniPocetna();
            $podaci['meni1']=$this->meni->ucitajMeniAdmin();
            $podaci['meni2']=$this->meni->ucitajMeniKorisnik();
        
            $podaci['session']=$this->session->all_userdata();
            
            $this->load->view('header', $podaci);
            $this->load->view('autor');
            $this->load->view('footer');
	}
        
        //Kontakt strana        
        public function kontakt(){
            
            $this->load->model('menimodel','meni');
            $podaci['meni']=$this->meni->ucitajMeniPocetna();
            $podaci['meni1']=$this->meni->ucitajMeniAdmin();
            $podaci['meni2']=$this->meni->ucitajMeniKorisnik();
      
            //Regularni izrazi
            $this->load->library('form_validation');
         
            $dugme=$this->input->post('btnUnesi');
               if($dugme){              
                 $this->form_validation->set_rules('tbIme','Ime','required');          
                 $this->form_validation->set_rules('tbEmail','Email','required|valid_email');
                 $this->form_validation->set_rules('taPoruka','Poruka','required');
                 
                 $this->form_validation->set_message('required','Field %s is required!');                 
                
               if($this->form_validation->run()){
                   $this->session->set_flashdata('uspeh', '<div class="alert alert-success" role="alert">Your message was sent successfully!</div>');
                   redirect("strane/kontakt");
                 }
            }
            
            $podaci['session']=$this->session->all_userdata();
            
            $this->load->view('header', $podaci);
            $this->load->view('kontakt');
            $this->load->view('footer');
        }
        
         public function resize($path, $file){
            $config['image_library']='gd2';
            $config['source_image']=$path;
            $config['create_thumb']=TRUE;
            $config['quality']="100%";
            $config['width']=70;
            $config['height']=75;
            $config['new_image']='./img/thumb/'.$file;
            $config['overwrite'] = TRUE;
            
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
               
              
        }
        
        public function registracija(){
         $this->load->model('menimodel','meni');
            $podaci['meni']=$this->meni->ucitajMeniPocetna();
            $podaci['meni1']=$this->meni->ucitajMeniAdmin();
            $podaci['meni2']=$this->meni->ucitajMeniKorisnik();
            $this->load->model('korisnicimodel', 'korisnici');   
            
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
                        'slika_thumb'=>'img/thumb/'.$data['upload_data']['raw_name']
                           .'_thumb'.$data['upload_data']['file_ext'],
                        'id_uloga'=>'2'
                    );
                  
                    $this->korisnici->unesi_korisnika($korisnik);
                    redirect('postovi/index');
                                
            }
            }       
            
            $this->load->view('header', $podaci);
            $this->load->view('korisnici');
            $this->load->view('footer');
        }
}