<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Postovi extends Frontend_Controller {
        //Svi postovi i login forma
    function __construct ()
    {
        parent::__construct();       
        
    }
    
        public function index(){

        //Ucitavanje menija
        $this->load->model('menimodel','meni');
        $podaci['meni']=$this->meni->ucitajMeniPocetna();
        $podaci['meni1']=$this->meni->ucitajMeniAdmin();
        $podaci['meni2']=$this->meni->ucitajMeniKorisnik();
        $this->load->model('home_model');
                $podaci['sveAnkete'] = $this->home_model->sveAnkete();
                $podaci['anketeOdgovori'] = $this->home_model->anketeOdgovori();
              
        //Login forma
        $podaci['username']=array(
        'value'=>'',
        'placeholder'=>"Username",
        'class'=>'form-control input-lg',
        'name'=>'username'
        );
        $podaci['password']=array(                
        'value'=>'',
        'placeholder'=>"Password",
        'class'=>'form-control input-lg',
        'name'=>'password',
        'type'=>'password'
        );
        $podaci['dugme']=array(
        'name'=>'login',
        'value'=>'Login',
        'type'=>'submit',
        'content'=>'Sign in',
        'class'=>'btn btn-primary btn-lg btn-block'
        );

        $podaci['formaAttr'] = array(
        'name'=>'formaLogin',
        'method'=>'post'
        );
        $this->load->model('postovimodel', 'pm');
        $podaci['br']=$this->pm->vrati_broj_postova();
        //Logovanje
        $username=  $this->input->post('username');
        $password=  $this->input->post('password'); 

        $this->load->model('logovanjemodel','lm');
        $rezultat= $this->lm->login($username,$password);
        
        $podaci['brOglasa']=$this->pm->vrati_broj_postova();
        $podaci['brKom']=$this->pm->vrati_broj_kom();
        $podaci['brKor']=$this->pm->vrati_broj_kor();
        
        $dugme=  $this->input->post('login');

        if($dugme!=''){ 

        if($rezultat['broj_redova']==1){
        $sesija=array(
        'korisnik'=>$rezultat['logovanje_redovi'][0]['ime'],
        'uloga'=>$rezultat['logovanje_redovi'][0]['naziv'],
        'id_kor'=>$rezultat['logovanje_redovi'][0]['id_korisnik']
        );
        $this->session->set_userdata($sesija);
       
         redirect('postovi/ponpot');           
        }
          
        else{

        redirect(base_url());
        }     
        }
        $podaci['session']=$this->session->all_userdata();

        $this->load->view('header', $podaci);
        $this->load->view('pocetna', $podaci);
        $this->load->view('footer', $podaci);
        }

        //Logout
        public function logout(){
        $this->session->sess_destroy();
        redirect('postovi/index');
        }

        //Jedan post
        public function post($post_id){

        //Ucitavanje menija
        $this->load->model('menimodel','meni');        
        $podaci['meni']=$this->meni->ucitajMeniPocetna();
        $podaci['meni1']=$this->meni->ucitajMeniAdmin();
        $podaci['meni2']=$this->meni->ucitajMeniKorisnik();
        //Ucitavanje komentara i posta
        $this->load->model('komentarimodel','komentari');
        $this->load->model('postovimodel','postovi');

        $podaci['komentari'] = $this->komentari->vrati_komentare($post_id);       
        $podaci['post'] = $this->postovi->vrati_post($post_id);

        $podaci['session']=$this->session->all_userdata();

        $this->load->view('header', $podaci);
        $this->load->view('post', $podaci);
        $this->load->view('footer', $podaci);
        }

       
        
        //Dodavanje novog oglasa
        public function novi_post(){
        $this->load->model('menimodel','meni');        
        $podaci['meni']=$this->meni->ucitajMeniPocetna();
        $podaci['meni1']=$this->meni->ucitajMeniAdmin();
        $podaci['meni2']=$this->meni->ucitajMeniKorisnik();

        $this->load->model('postovimodel','postovi');
        ;
        $podaci['vrstaposla']=$this->postovi->vrstaposla();
        $podaci['granaposla']=$this->postovi->granaposla();
        $podaci['tipoglasa']=$this->postovi->tipoglasa();
        
        //Unos oglasa
        $unesi=$this->input->post('btnUnesi');
        
         //Klik na unos oglasa
        if($unesi!=''){

        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '900';
        $config['upload_path'] = './img/';
        $config['max_width']  = '3000';
        $config['max_height']  = '3338';
        $putanja='img/';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('fSlika')){
        $error = array('error' => $this->upload->display_errors());
        foreach($error as $err){
          echo $err;
        }
        }
        else{
            $data=$this->upload->data();
            
               $oglas=array(
                    'naslov'=>$this->input->post('tbNaslov'),
                    'tekst'=>$this->input->post('taTekst'),
                    'p_slika'=>$putanja.$data['file_name'],
                    'datum'=> date("Y-m-d"),
                    'id_korisnik'=>$this->session->userdata('id_kor'),
                    'idTip'=>$this->input->post('ddlTipOgl'),
                    'granaposlaId'=>$this->input->post('ddlGrana'),
                    'idVrstaPosla'=>$this->input->post('ddlVrsta')
                );
                $this->postovi->unesi_oglas($oglas);
        }
        }       
        $podaci['session']=$this->session->all_userdata();

        $this->load->view('header', $podaci);
        $this->load->view('novi_post');
        $this->load->view('footer', $podaci);
}

        
        
        //Biranje ponude ili potraznje posla
        public function ponpot(){
            
            $this->load->model('menimodel','meni');
            $podaci['meni']=$this->meni->ucitajMeniPocetna();
            $podaci['meni1']=$this->meni->ucitajMeniAdmin();
            $podaci['meni2']=$this->meni->ucitajMeniKorisnik();
            $this->load->model('postovimodel', 'postovi');
            
            //cv
            $this->load->model('cvmodel');
            $id=$this->session->userdata('id_kor');
            $podaci['brcv']=$this->cvmodel->brcv();
            
            
            //Poslednji oglasi
            $podaci['poslednji']=$this->postovi->poslednji();
            
            $podaci['session']=$this->session->all_userdata();
            $this->load->view('header', $podaci);
            $this->load->view('ponpot', $podaci);
            $this->load->view('footer', $podaci);
        }
        
        //Poslednji oglasi
        

        //Ponuda
        public function ponuda($start=0){
            $this->load->model('menimodel','meni');
            $podaci['meni']=$this->meni->ucitajMeniPocetna();
            $podaci['meni1']=$this->meni->ucitajMeniAdmin();
            $podaci['meni2']=$this->meni->ucitajMeniKorisnik();
      
       //Ucitavanje postova           
       $this->load->model('postovimodel', 'postovi');
       $podaci['postovi']=$this->postovi->vrati_postove(3, $start);
       $podaci['img']=array(
       'class'=>'img-responsive'
      );

       
       
     //Tip posla filter
     
      $podaci['tipFilter']=$this->postovi->tipoglasa();
      $podaci['granaFilter']=$this->postovi->granaposla();
      
      $this->load->model('postovimodel', 'postovi');
            
      $tipFilter=$this->input->post('ddlTipFilter'); 
      $podaci['tipFilterId']=$this->postovi->tipFilterId($tipFilter);
      
     //Stranicenje
      $this->load->library('pagination');
      $config['base_url']=base_url().'postovi/ponuda/';
      $config['total_rows']=$this->postovi->vrati_broj_postova();
      $config['per_page']=3;

      //Izgled stranicenja
      $config['full_tag_open'] = "<ul class='pagination'>";
      $config['full_tag_close'] ="</ul>";
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';
      $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
      $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
      $config['next_tag_open'] = "<li>";
      $config['next_tagl_close'] = "</li>";
       $config['prev_tag_open'] = "<li>";
       $config['prev_tagl_close'] = "</li>";
       $config['first_tag_open'] = "<li>";
       $config['first_tagl_close'] = "</li>";
       $config['last_tag_open'] = "<li>";
      $config['last_tagl_close'] = "</li>";      


        $this->pagination->initialize($config);        
        $podaci['strane']=$this->pagination->create_links();   

            $podaci['session']=$this->session->all_userdata();
            $this->load->view('header', $podaci);
            $this->load->view('ponuda', $podaci);
            $this->load->view('footer', $podaci);
        }
        
        //Cv
        public function cv(){
            $this->load->helper('download');
            $this->load->model('menimodel','meni');
            $podaci['meni']=$this->meni->ucitajMeniPocetna();
            $podaci['meni1']=$this->meni->ucitajMeniAdmin();
            $podaci['meni2']=$this->meni->ucitajMeniKorisnik();
            $this->load->model('postovimodel', 'p');
            $this->load->model('cvmodel', 'cv');
            $id=$this->session->userdata('id_kor');
            $cv=$this->cv->vraticv($id);
            $podaci['poslednji']=$this->p->poslednji();
             $this->load->library('table');
            $this->table->set_heading('CV title', 'Post title', 'Download link');
            foreach($cv as $c){
               $download=anchor('postovi/download_file/'.$c->putanja, '<i class="fa fa-download" aria-hidden="true"></i>');
               $this->table->add_row($c->putanja, $c->naslov, $download);
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
            
            $podaci['session']=$this->session->all_userdata();
            $this->load->view('header', $podaci);
            $this->load->view('cv', $podaci);
            $this->load->view('footer', $podaci);
        }
        
        function download_file($file_name){
            $this->load->helper('download');
            $data = file_get_contents(base_url().'/cv/'.$file_name); // Read the file's contents
            $name = $file_name;
            force_download($name, $data);
}

        //Upload CV-ja
        public function cvupload($id){
            $this->load->model('cvmodel', 'cv');
$cv=$this->input->post('btnUnesiCv');
       
        if($cv!=''){
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size']	= '900';
        $config['upload_path'] = './cv/';
        $putanja='';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('fCv')){
        $error = array('error' => $this->upload->display_errors());
        foreach($error as $err){
          echo $err;
        }
        redirect('postovi/post/'.$id);
        }
        else{
            $data=$this->upload->data();
            
               $sivi=array(                    
                    'putanja'=>$putanja.$data['file_name'],                    
                    'id_oglas'=>$id
                );
                $this->cv->unoscv($sivi);
                redirect('postovi/post/'.$id);
        }
        }       
        }
        
        public function filter(){
            $this->load->model('menimodel','meni');
            $podaci['meni']=$this->meni->ucitajMeniPocetna();
            $podaci['meni1']=$this->meni->ucitajMeniAdmin();
            $podaci['meni2']=$this->meni->ucitajMeniKorisnik();
      
       //Ucitavanje postova           
       $this->load->model('postovimodel', 'postovi');
      
       $podaci['img']=array(
       'class'=>'img-responsive'
      );

      //Filter po grani i tipu
       $klik=$this->input->post('btnFilter');
       
       if($klik!=''){
           
              $idVrstaPosla=$this->input->post('ddlTip');
              $granaposlaId=$this->input->post('ddlGrana');
          
           $f=$this->postovi->filter($idVrstaPosla, $granaposlaId);
       }
       $podaci['postoviFilter']=$f;
       
       
     




            $podaci['session']=$this->session->all_userdata();
            $this->load->view('header', $podaci);
            $this->load->view('filter', $podaci);
            $this->load->view('footer', $podaci);
        }
        
        
      public function ajaxVrsta()
   {
          $this->load->model('postovimodel', 'p');
       if(isset($_POST['grana_id']))
       {
           $this->output
                   ->set_content_type("application/json")
                   ->set_output(json_encode($this->p->vratiVrstu($_POST['grana_id'])));
       }
   }
        
}